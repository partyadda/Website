<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\addon;
use App\Models\addoncat;
use Illuminate\Support\Facades\DB;
use App\Models\decoration;
use App\Models\asset;

class AddonController extends Controller
{
    public function index()
    {
        $addoncat = addoncat::get();
        return view('add_add-on',compact('addoncat'));
    }
    public function view()
    {
        
        $addons = addon::get();
        $assets = asset::whereIn('lookup_id', $addons->pluck('id'))->where('lookup_data', 'addon')->get();
        $addonsWithAssets = $addons->map(function($addon) use ($assets) {
			// Filter assets related to this decoration
            $addon->assets = $assets->where('lookup_id', $addon->id)->sortby('sequenceno');
            return $addon;
         });
         // dd($addonsWithAssets);
        return view("view_add-ons", compact("addons",'addonsWithAssets'));
    }    
    public function addon($id){
        $addoncat = addoncat::get();
        $addon = addon::find($id);
        $asset = asset::where("lookup_id", $id)
            ->where("lookup_data", "addon")
            ->first();
        return view('add_add-on',compact(['addon','asset','addoncat']));    
    }
 
    public function create(Request $request)
    {
        
        if ($request->enabled == "") {
            $publish = 0;
        } else {
            $publish = 1;
        }

        $addon = new addon();
        
        $addon->name = $request->name;
        $addon->details = $request->details;
        $addon->category = $request->category;
        $addon->sequence = $request->sequence;
        $addon->enabled = $publish;
        
        if($addon->save()){
            $id = $addon->id;
            $asset = new asset();
            $asset->lookup_id = $id;
            $asset->lookup_data = "addon";
            $asset->description = $addon->name;
            $asset->asset_type = "image";
            // Handle file upload if there's an image
            if ($request->hasFile("photo")) {
                $filename = time() . "." . $request->photo->extension();
                $request->photo->move(public_path("assets/img/addon"), $filename);
                $asset->filename = $filename;
                $asset->foldername = "addon";
            }
            $asset->save();
        }
        
        return redirect()->route('admin.view_add-ons');
    }
 
    public function suspend($id){
        $addons = decoration::where("enabled", 1)->get();
        
        $addons_status = addon::find($id);
        if($addons_status->enabled == 1){
            $message = "Add-on has been Suspend";
            $addons_status->enabled = 0;
        }  
        else{
            $message = "Add-on has been Unsuspend";
            $addons_status->enabled = 1;
        }
        
        $addons_status->update();
        $addons = addon::get();
        return redirect()->back();
    }
    
    public function update(Request $request,$id){
        if ($request->enabled == "") {
            $publish = 0;
        } else {
            $publish = 1;
        }   
        $addon = addon::find($id);
        
        $addon->name = $request->name;
        $addon->details = $request->details;
        $addon->category = $request->category;
        $addon->sequence = $request->sequence;
        $addon->enabled = $publish;
        
        if($addon->update()){
            
            $asset = asset::where('lookup_id',$id)->where('lookup_data','addon')->first();
            
            $asset->lookup_data = "addon";
            $asset->description = $addon->name;
            $asset->asset_type = "image";
            // Handle file upload if there's an image
            if ($request->hasFile("photo")) {
                $filename = time() . "." . $request->photo->extension();
                $request->photo->move(public_path("assets/img/addon"), $filename);
                $asset->filename = $filename;
                $asset->foldername = "addon";
            }
            else{
                $asset->filename = $asset->filename;
                    $asset->foldername = $asset->foldername;
            }
            $asset->update();
            
            return redirect()->route('admin.view_add-ons');
        }
    }
    //Add-On Categoy Functions
    public function create_addoncat(Request $request){
        $addoncat = new addoncat();
        $addoncat->name = $request->name;
        if ($request->enabled == "1") {
            $addoncat->enabled = 1;
        } else {
            $addoncat->enabled = 0;
        }
        if($addoncat->save()){
            return redirect()->route('admin.view_addoncat');
        }
    }    
    
    public function update_addoncat(Request $request,$id){
        $addoncat = addoncat::find($id);
        $addoncat->name = $request->name;
        $addoncat->enabled = $request->enabled;
        if($addoncat->update()){
            return redirect()->route('admin.view_addoncat');
        }
    }    
    
    public function addoncat(){
        $addoncategories = addoncat::get();
        return view("view_addon_category", compact("addoncategories"));
    }
    
    public function edit_addoncat($id){
        $editaddoncategories = addoncat::find($id);
        $addoncategories = addoncat::get();
        return view("view_addon_category", compact("editaddoncategories","addoncategories"));
    }
    
    public function suspend_addoncat($id){
        // dd($id);
        // $slots = addoncat::where("enabled", 1)->get();
        
        $addoncat_status = addoncat::find($id);

        if($addoncat_status->enabled == 1){
            $message = "Add-On Category has been Suspend";
            $addoncat_status->enabled = 0;
        }  
        else{
            $message = "Add-On Category has been Unsuspend";
            $addoncat_status->enabled = 1;
        }
        
        $addoncat_status->update();
        return redirect()->back()
        ->with("success", $message);
    }
}