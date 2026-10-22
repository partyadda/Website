<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\theatre;
use App\Models\home_banner;
use App\Models\city;
use App\Models\branch;
use App\Models\asset;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
class homeController extends Controller
{
    public function index(){
        $theatre = theatre::where('status', 1)
    ->whereHas('assets', function ($query) {
        $query->where('enabled', 1);
    })
    ->with(['assets' => function ($query) {
        $query->where('enabled', 1);
    }])
    ->get();
     $home_banner = asset::where('enabled',1)->where('lookup_data','home')->get();
     $city = city::where('enabled',1)->get();
     
     //print_r($home_banner);exit;
     //print_r($city);exit;
     
     $theatre_carousel = theatre::where('branch_id',1)->whereIn('id',[1,2,3,4])
         ->whereHas('assets', function ($query) {
        $query->where('enabled', 1)
               ->where('lookup_data','theatre');
    })
    ->with(['assets' => function ($query) {
        $query->where('enabled', 1)
        ->where('lookup_data','theatre');
    
    }])
    ->get()
    ->map(function ($theatre) {
            $theatre->assets->transform(function ($carousel) {
                $carousel->image_url = URL::asset('assets/img/'.$carousel->foldername.'/' . $carousel->filename);
                return $carousel;
            });
            return $theatre;
        });
        //print_r($home_banner);exit;
        return view('index',compact(['theatre','home_banner','city','theatre_carousel']));
    }
    
    public function banner(){
        $home_banner = asset::where('enabled',1)->where('lookup_data','home')->pluck('description');
        return response()->json($home_banner);
    }
    
    public function home($id){
        
        $theatre_by_id = theatre::where('id', $id)
        ->where('status', 1)
->with([
        'assets' => function ($query) {
            $query->where('enabled', 1)
                  ->where('lookup_data','theatre');
        },
        'branchs' => function ($query) {
            $query->select('id', 'advance_amount','decoration_amount','cancellation_terms');
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
    return view('home',compact(['theatre_by_id','advance_amount','cancellation']));
    }
    public function city_branch(Request $request){
        // echo $request->city_id;
        $branch = branch::where('city_id',$request->city_id)->get();
        return response()->json($branch);
    }
    
    
    public function branch_theatre(Request $request){
         $theatre = theatre::where('branch_id', $request->branch)->whereIn('id',[6,7,8])
         ->whereHas('assets', function ($query) {
        $query->where('enabled', 1)
               ->where('lookup_data','theatre');
    })
    ->with(['assets' => function ($query) {
        $query->where('enabled', 1)
        ->where('lookup_data','theatre');
    
    }])
    ->get()
    ->map(function ($theatre) {
            $theatre->assets->transform(function ($carousel) {
                $carousel->image_url = URL::asset('assets/img/'.$carousel->foldername.'/' . $carousel->filename);
                return $carousel;
            });
            return $theatre;
        });
        // $theater = theatre::where('branch_id',$request->branch)->get();
         return response()->json($theatre);
    }
    
}
