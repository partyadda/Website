<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\slot;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TimeSlotsController extends Controller
{
    
    public function index()
    {
        $slots = slot::get();
        return view("view_timeslots", compact("slots"));
    }
    public function timeslot($id)
    {
        $slots = slot::get();
        $slots_u = slot::find($id);
        // dd($slots);
        return view("view_timeslots", compact("slots","slots_u","id"));
    }    
     
    public function create(Request $request)
    {
        
        // return $request;
        $slots = slot::where("enabled", 1)->get();
        if ($request->enabled == "") {
            $publish = 0;
        } else {
            $publish = 1;
        }
        
        $slot = new slot();
        $slot->name	=  $request->name;
        $slot->start_time =  $request->start_time; 
        $slot->end_time = $request->end_time;
        $slot->duration = $request->duration;
        $slot->DayPart = $request->DayPart;
        $slot->Percentage = $request->Percentage; 
        $slot->enabled = $publish;
        $slot->save();
        return redirect()
            ->route("admin.view_timeslots")
            ->with("success", "Time Slot has been Added");
        // return view("view_timeslots",compact("slots"));
    }
    public function suspend($id){
        $slots = slot::where("enabled", 1)->get();
        
        $slots_status = slot::find($id);
        // return $slots;
        if($slots_status->enabled == 1){
            $message = "Time Slot has been Suspend";
            $slots_status->enabled = 0;
        }  
        else{
            $message = "Time Slot has been Unsuspend";
            $slots_status->enabled = 1;
        }
        
        $slots_status->update();
        return redirect()->back()
        ->with("success", $message);
    }
    
    
    public function update(Request $request,$id)
    {
        $slots = slot::where("enabled", 1)->get();
        // return $request;
        $slots_e = slot::find($id);
        if ($request->enabled == "") {
            $publish = 0;
        } else {
            $publish = 1;
        }
        
        
        $slots_e->name	=  $request->name;
        $slots_e->start_time =  $request->start_time; 
        $slots_e->end_time = $request->end_time;
         $slots_e->duration = $request->duration;
        $slots_e->DayPart = $request->DayPart;
        $slots_e->Percentage = $request->Percentage; 
        $slots_e->enabled = $publish;
        $slots_e->update();
        
        return redirect()
            ->route("admin.view_timeslots")
            ->with("success", "Time Slot has been Updated");
    }
}