<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\branch;
use App\Models\city;
use App\Models\theatre;


class BranchController extends Controller
{
    public function index()
    {   
        $city = city::where('enabled',1)->get();
        $branch_data = branch::with(['theatres','decorations','cakes','addons'])->get();
        // dd($branch_data);
        return view("add_branch",compact("branch_data","city"));
    }
    
    public function view(){
        $branches = branch::with(['theatres','decorations','cakes','addons'])->get();
        return view("view_branches", compact("branches"));
        
    }
    
    public function create(Request $request)
    {
        $branch = new branch();
        $branch->branch_name = $request->branch_name;
        $branch->advance_amount = $request->advance_amount;
        $branch->decoration_amount = $request->decoration_amount;
        $branch->cancellation_terms = $request->cancellation_terms;
        $branch->business_name = $request->business_name;
        $branch->email = $request->email;
        $branch->contactnumber = $request->contactnumber;
        $branch->city_id = $request->city_id;
        $branch->gmap_loc = $request->gmap_loc;
        $branch->review_rating = $request->review_rating;
        $branch->address = $request->address;
        $branch->enabled = $request->enabled;
        $branch->save();
        
        return redirect()->route('admin.add_branch')->with('success','Branch has been added');
    }
    
    public function branch($id){
         $city = city::where('enabled',1)->get();
        $branch_u = branch::find($id);
        $branch_data = branch::with(['theatres','decorations','cakes','addons'])->get();
        return view('add_branch',compact('branch_u','city','branch_data'));
    }
    
    public function update(Request $request,$id){
        $branch = branch::find($id);
        $branch->branch_name = $request->branch_name;
        $branch->enabled = $request->enabled;
        $branch->update();
        return redirect()->route('admin.branches')->with('success','Branchy has been Updated');
    }
    
    public function suspend($id, $status)
    {
        // dd($id);
        $branch = branch::find($id);
        // dd($asset);
        if ($branch->enabled == 1) {
            // dd('yes');
            $message = "Branch Suspended";
            $branch = branch::where("id", $id)->update([
                "enabled" => 0,
            ]);
        } else {
            $message = "Branch Unsuspended";
            // dd('no');
            $branch = branch::where("id", $id)->update([
                "enabled" => 1,
            ]);
        }
        return redirect()->back()->with('success',$message);
    }
}