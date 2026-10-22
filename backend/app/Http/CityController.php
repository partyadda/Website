<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\city;
use App\Models\branch;
use App\Models\theatre;
// use Illuminate\Support\Str;
class CityController extends Controller
{
    public function index()
    {
        // $cities = city::get();
        return view("add_city");
    }
    
    public function view(){
    //     $cities =  city::withCount('branch')  // Count branches for each city
    // ->with(['branch' => function ($query) {
    //     $query->withCount('theatres');  // Count theatres for each branch
    // }])
    // ->get();
    $cities = City::withCount('branch')  // Count branches for each city
    ->with(['branch' => function ($query) {
        $query->withCount('theatres');  // Count theatres for each branch
    }])
    ->get();
    // dd($cities);
        return view("view_cities", compact("cities"));
        
    }
    
    public function create(Request $request)
    {
        // return $request;
        if ($request->enabled == "") {
            $publish = 0;
        } else {
            $publish = 1;
        }
        $city = new city();
        $city->city_name = $request->city_name;
        $city->enabled = $publish;
        $city->save();
        
        return redirect()->route('admin.add_city')->with('success','City Has been Added');
        
    }
    
    public function city($id){
        $city_u = city::find($id);
        return view('add_city',compact('city_u'));
    }
    
    public function update(Request $request,$id){
        // return  $request;
        if ($request->enabled == "") {
            $publish = 0;
        } else {
            $publish = 1;
        }
        $city = city::find($id);
        $city->city_name = $request->city_name;
        $city->enabled = $publish;
        $city->update();
        return redirect()->route('admin.view_cities')->with('success','City has been Updated');
    }
    
    
    public function suspend($id, $status)
    {
        // dd($id);
        $city = city::find($id);
        // dd($asset);
        if ($city->enabled == 1) {
            // dd('yes');
            $message = "City Suspended";
            $city = city::where("id", $id)->update([
                "enabled" => 0,
            ]);
        } else {
            $message = "City Unsuspended";
            // dd('no');
            $city = city::where("id", $id)->update([
                "enabled" => 1,
            ]);
        }
        return redirect()->back()->with('success',$message);
    }
    
    
    public function view_city_branchs($id){
        $city_branchs = branch::with('city')->where('city_id',$id)->first();
        // dd($city_branchs);
        return view('view_city_branchs',compact('city_branchs'));
        
    }
    
    public function view_city_theatre($id){
        $city_theatre = branch::with(['city','theatres'])->where('city_id',$id)->first();
        // dd($city_theatre);
        return view('view_city_theatre',compact('city_theatre'));
        
    }
}