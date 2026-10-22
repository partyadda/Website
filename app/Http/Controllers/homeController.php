<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\theatre;
use App\Models\home_banner;
use App\Models\city;
use App\Models\branch;
use App\Models\asset;
use App\Models\Discount;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Js;

class homeController extends Controller
{
  public function index($branch_name = NULL)
  {
    $theatre = theatre::where('status', 1)
      ->whereHas('assets', function ($query) {
        $query->where('enabled', 1);
      })
      ->with([
        'assets' => function ($query) {
          $query->where('enabled', 1);
        },
        'branchs' => function ($query) {
          $query->select('id', 'advance_amount', 'decoration_amount', 'cancellation_terms');
        },
        'packages'
      ])
      ->get()
      ->map(function ($theatre) {
        // Strip HTML from short_description and add as plain_description
        $theatre->plain_description = strip_tags($theatre->short_description);
        return $theatre;
      });

    $home_banner = asset::where('enabled', 1)->where('lookup_data', 'home')->get();
    $city = city::where('enabled', 1)->get();

    $branch_id = 1;
    if ($branch_name == NULL) 
    {
        $branch_id = 1;
    }
    //this is for branch id 2
    if ($branch_name == "jpnagar") 
    {
        $branch_id = 2;
    }

    $theatre_carousel = theatre::where('branch_id', $branch_id)->where('status', 1)
      ->whereHas('assets', function ($query) {
        $query->where('enabled', 1)
          ->where('lookup_data', 'theatre');
      })

      ->with([
        'assets' => function ($query) {
          $query->where('enabled', 1)
            ->where('lookup_data', 'theatre');
        }
      ])
      ->with([
        'slots' => function ($query) {
          $query->where('theatre_slot.enabled', 1) // Correctly reference the pivot table
            ->orderBy('theatre_slot.sequence'); // Order by the sequence in the pivot table
        }
      ])
      ->get()
      ->map(function ($theatre) {
        $theatre->plain_description = strip_tags($theatre->short_description);
        $theatre->assets->transform(function ($carousel) {
          $carousel->image_url = URL::asset('assets/img/' . $carousel->foldername . '/' . $carousel->filename);
          return $carousel;
        });
        return $theatre;
      });

    $coupon_code =  Discount::where(['enabled' => 1, ['valid_until', '>=', now()->format('Y-m-d')]])->first();

    $isMobile = $this->isMobile();

    return view('index', compact(['theatre', 'home_banner', 'city', 'theatre_carousel', 'coupon_code', 'isMobile']));
  }

  function isMobile()
  {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
  }

  public function indexPackage()
  {
    $theatre = theatre::where('status', 1)
      ->whereHas('assets', function ($query) {
        $query->where('enabled', 1);
      })
      ->with([
        'assets' => function ($query) {
          $query->where('enabled', 1);
        },
        'branchs' => function ($query) {
          $query->select('id', 'advance_amount', 'decoration_amount', 'cancellation_terms');
        }
      ])
      ->get()
      ->map(function ($theatre) {
        // Strip HTML from short_description and add as plain_description
        $theatre->plain_description = strip_tags($theatre->short_description);
        return $theatre;
      });
    $home_banner = asset::where('enabled', 1)->where('lookup_data', 'home')->get();
    $city = city::where('enabled', 1)->get();

    $theatre_carousel = theatre::where('branch_id', 1)->where('status', 1)
      ->whereHas('assets', function ($query) {
        $query->where('enabled', 1)
          ->where('lookup_data', 'theatre');
      })
      ->with([
        'assets' => function ($query) {
          $query->where('enabled', 1)
            ->where('lookup_data', 'theatre');
        }
      ])
      ->with([
        'slots' => function ($query) {
          $query->where('theatre_slot.enabled', 1) // Correctly reference the pivot table
            ->orderBy('theatre_slot.sequence'); // Order by the sequence in the pivot table
        }
      ])
      ->get()
      ->map(function ($theatre) {
        $theatre->plain_description = strip_tags($theatre->short_description);
        $theatre->assets->transform(function ($carousel) {
          $carousel->image_url = URL::asset('assets/img/' . $carousel->foldername . '/' . $carousel->filename);
          return $carousel;
        });
        return $theatre;
      });

    $coupon_code =  Discount::where(['enabled' => 1, ['valid_until', '>=', now()->format('Y-m-d')]])->first();

    return view('indexPackage', compact(['theatre', 'home_banner', 'city', 'theatre_carousel', 'coupon_code']));
  }

  public function banner()
  {
    $home_banner = asset::where('enabled', 1)->where('lookup_data', 'home')->pluck('description');
    return response()->json($home_banner);
  }

  public function home($name)
  {
    $theatre = theatre::where('name', $name)->firstOrFail();
    $theatre_by_id = theatre::where('id', $theatre->id)
      ->where('status', 1)
      ->with([
        'assets' => function ($query) {
          $query->where('enabled', 1)
            ->where('lookup_data', 'theatre');
        },
        'branchs' => function ($query) {
          $query->select('id', 'advance_amount', 'decoration_amount', 'cancellation_terms');
        },
        'slots' => function ($query) {
          $query->where('theatre_slot.enabled', 1) // Correctly reference the pivot table
            ->orderBy('theatre_slot.sequence'); // Order by the sequence in the pivot table
        }
      ])
      ->first();
    if ($theatre_by_id && $theatre_by_id->branchs) {
      $advance_amount = $theatre_by_id->branchs->advance_amount;
      $cancellation = $theatre_by_id->branchs->cancellation_terms;
    } else {
      $advance_amount = null; // or handle the case when there's no branch
      $cancellation = null;
    }

    // $branch_id = branch::select('advance_amount')->where('branch_id',$id)->get();
    return view('privatetheatre', compact(['theatre_by_id', 'advance_amount', 'cancellation']));
  }
  public function city_branch(Request $request)
  {
    // echo $request->city_id;
    $branch = branch::where('city_id', $request->city_id)->get();
    return response()->json($branch);
  }


  public function branch_theatre(Request $request)
  {
    $theatre = theatre::where('branch_id', $request->branch)->whereIn('id', [6, 7, 8])
      ->whereHas('assets', function ($query) {
        $query->where('enabled', 1)
          ->where('lookup_data', 'theatre');
      })
      ->with(['assets' => function ($query) {
        $query->where('enabled', 1)
          ->where('lookup_data', 'theatre');
      }])
      ->get()
      ->map(function ($theatre) {
        $theatre->assets->transform(function ($carousel) {
          $carousel->image_url = URL::asset('assets/img/' . $carousel->foldername . '/' . $carousel->filename);
          return $carousel;
        });
        return $theatre;
      });
    // $theater = theatre::where('branch_id',$request->branch)->get();
    return response()->json($theatre);
  }

  public function gallery()
  {
      
    $data['theatres'] = $theatres = 
    theatre::with('theatre_assets')->get()->map(function ($theatre) 
    {
      $theatre->theatre_assets->transform(function ($carousel) 
      {
        $carousel->image_url = URL::asset('assets/img/' . $carousel->foldername . '/' . $carousel->filename);
        return $carousel;
      }
      
    );
      return $theatre;
    });
    
    return view('gallery', $data);
  }
}
