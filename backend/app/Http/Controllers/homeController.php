<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\theatre;
use App\Models\home_banner;
use App\Models\city;
use App\Models\branch;
use App\Models\asset;
use App\Models\cake;
use App\Models\booking;
use App\Models\decoration;
use App\Models\occasion;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Auth;
// use App\Models\User;
use Auth;

class homeController extends Controller
{

  //  public function index(){

  //     return view('index');
  // }


  // public function login(Request $request){
  // //   return $request;
  //     $request->validate([
  //         'email' => 'required|email',
  //         'password' => 'required',
  //     ]);

  //     // Attempt to authenticate the user
  //     // if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
  //     //     // dd(Auth::user()); 
  //     //     // dd('yes');
  //     //     // Authentication passed, redirect to the dashboard
  //     //     //  return redirect()->route('dashboard');
  //     //     return redirect()->route('dashboard');
  //     // }

  //     $credentials = $request->only('email', 'password');

  //     if (Auth::attempt($credentials)) {
  //         // dd('yes');
  //         return redirect()->intended('/dashboard');
  //     }

  //     // Authentication failed, redirect back with an error
  //     return back()->with('error', 'Invalid credentials.');
  // }


  public function index()
  {
    $sortedBranchIds = session('branch_ids', []);
    if ($sortedBranchIds == null) {
      return redirect()->route('index');
    } else {
      $booking  = booking::count('id');
      $theatre = theatre::count('id');
      $branch = branch::count('id');
      $booking_sum = booking::sum('final_price');
      $cake = cake::count('id');
      $decoration = decoration::count('id');
      $occasion = occasion::count('id');
      $total_guest = booking::sum('No_people');
      $theatreWithMaxBookings = booking::join('theatre', 'booking.theatre_id', '=', 'theatre.id')
        ->select('theatre.name', DB::raw('count(booking.id) as total_bookings'))
        ->groupBy('theatre.name')
        ->orderBy('total_bookings', 'desc')
        ->first(); // Get the theatre with the highest bookings

      $theatreWithMaxRevenue = booking::join('theatre', 'booking.theatre_id', '=', 'theatre.id')
        ->select('theatre.name', DB::raw('SUM(booking.final_price) as total_revenue'))
        ->groupBy('theatre.name')
        ->orderBy('total_revenue', 'desc')
        ->first();

      $theatreWithMaxCustomer = booking::join('theatre', 'booking.theatre_id', '=', 'theatre.id')
        ->join('customer', 'booking.customer_id', '=', 'customer.id')
        ->select('theatre.name', DB::raw('count(booking.id) as total_bookings'))
        ->groupBy('theatre.name')
        ->orderBy('total_bookings', 'desc')
        ->first();

      $theatreWithLowserCustomer = booking::join('theatre', 'booking.theatre_id', '!=', 'theatre.id')
        ->join('customer', 'booking.customer_id', '=', 'customer.id')
        ->select('theatre.name', DB::raw('count(booking.id) as total_bookings'))
        ->groupBy('theatre.name')
        ->orderBy('total_bookings', 'desc')
        ->first();
      $sortedBranchIds = session('branch_ids', []);
      // dd($sortedBranchIds[0]);
      $branch_bk = branch::select('branch_name', 'business_name', 'email', 'contactnumber', 'advance_amount')->where('id', $sortedBranchIds[0])->first();
      $booking = Booking::with(['customer', 'theatre', 'cake', 'slot', 'decoration', 'addons.addon'])
        ->orderBy('id', 'desc')  // Ordering by 'id' in descending order
        ->take(10)  // Limit the results to 10
        ->get();

      // Remove duplicate addons from each booking
      $booking->each(function ($book_k) {
        $book_k->addons = $book_k->addons->unique(function ($addon) {
          return $addon->addon->name;
        });
      });

      $isDashboard = 1;

      return view('dashboard', compact('booking', 'theatre', 'branch', 'booking_sum', 'cake', 'decoration', 'occasion', 'total_guest', 'theatreWithMaxBookings', 'theatreWithMaxRevenue', 'theatreWithMaxCustomer', 'theatreWithLowserCustomer', 'booking', 'branch_bk', 'isDashboard'));
    }
  }



  // public function index(){
  //     $theatre = theatre::where('status', 1)
  // ->whereHas('assets', function ($query) {
  //     $query->where('enabled', 1);
  // })
  // ->with(['assets' => function ($query) {
  //     $query->where('enabled', 1);
  // }])
  // ->get();
  //  $home_banner = asset::where('enabled',1)->where('lookup_data','home')->get();
  //  $city = city::where('enabled',1)->get();
  //     return view('index',compact(['theatre','home_banner','city']));
  // }

  public function banner()
  {
    $home_banner = asset::where('enabled', 1)->where('lookup_data', 'home')->pluck('description');
    return response()->json($home_banner);
  }

  public function home($id)
  {
    $theatre_by_id = Theatre::where('id', $id)
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
    return view('home', compact(['theatre_by_id', 'advance_amount', 'cancellation']));
  }
  public function city_branch(Request $request)
  {
    // echo $request->city_id;
    $branch = branch::where('city_id', $request->city_id)->get();
    return response()->json($branch);
  }


  public function branch_theatre(Request $request)
  {
    $theatre = theatre::where('branch_id', $request->branch)
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
}