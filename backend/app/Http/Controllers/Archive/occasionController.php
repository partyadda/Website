<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\occasion;
use App\Models\branch;
use App\Models\asset;
class occasionController extends Controller
{
    public function index(){
        return view('add_occasion');
    }
    
    public function create(Request $request)
    {
        $occasion = new occasion();
        $occasion->name	=  $request->name;
        $occasion->person1 =  $request->person1;
        $occasion->person2 =  $request->person2;
        $occasion->noofperson	=  $request->noofperson;
        $occasion->detail	=  $request->detail;
        //Asset Table Data
        if($occasion->save()){
            $id = $occasion->id;
            $asset = new asset();
            $asset->lookup_id = $id;
            $asset->lookup_data = "decoration";
            $asset->description = $occasion->detail;
            
            $asset->asset_type = "image";
            // Handle file upload if there's an image
            if ($request->hasFile("photo")) {
                $filename = time() . "." . $request->photo->extension();
                $request->photo->move(public_path("assets/img/decoration"), $filename);
                $asset->filename = $filename;
                $asset->foldername = "decoration";
            }
            $asset->save();
        }
        return redirect()->route("admin.view_occasions");
    }
    public function decoration_type(Request $request){
        // return $request;
        $type = occasion::select('person1','person2')->where('id',$request->decoration_id)->first();
        return response()->json($type);
    }
    public function view()
    {
        $occasions = occasion::get();
        $assets = asset::whereIn('lookup_id', $occasions->pluck('id'))->where('lookup_data', 'decoration')->get();
        $occasionsWithAssets = $occasions->map(function($occasion) use ($assets) {
            // Filter assets related to this decoration
            $occasion->assets = $assets->where('lookup_id', $occasion->id)->sortby('sequenceno');
            return $occasion;
        });
        
        // dd($occasionsWithAssets);
        return view("view_occasions", compact("occasions",'occasionsWithAssets'));
    }    
    public function occasion($id){
        $occasion = occasion::find($id);
        $asset = asset::where("lookup_id", $id)
            ->where("lookup_data", "decoration")
            ->first();
            
        return view('add_occasion',compact(['occasion','asset']));    
    }
    
     public function update(Request $request, $id){
        $occasion = occasion::find($id);
        $occasion->name	=  $request->name;
        $occasion->person1 =  $request->person1;
        $occasion->person2 =  $request->person2;
        $occasion->noofperson	=  $request->noofperson;
        $occasion->detail	=  $request->detail;        
        if($occasion->update()){
           $asset = asset::where('lookup_id',$id)->where('lookup_data','decoration')->first();
           if(empty($asset)){
            //   dd('yes');
            
            $id = $id;
            $asset = new asset();
            $asset->lookup_id = $id;
            $asset->lookup_data = "decoration";
            $asset->description = $occasion->detail;
            
            $asset->asset_type = "image";
            // Handle file upload if there's an image
            if ($request->hasFile("photo")) {
                $filename = time() . "." . $request->photo->extension();
                $request->photo->move(public_path("assets/img/decoration"), $filename);
                $asset->filename = $filename;
                $asset->foldername = "decoration";
            }
            $asset->save();
           }
           else{
            //   dd('No');
            
            $asset->lookup_data = "decoration";
            $asset->description = $occasion->detail;
            $asset->asset_type = "image";
            // Handle file upload if there's an image
            if ($request->hasFile("photo")) {
                $filename = time() . "." . $request->photo->extension();
                $request->photo->move(public_path("assets/img/decoration"), $filename);
                $asset->filename = $filename;
                $asset->foldername = "decoration";
            }
            else{
                  $asset->filename = $asset->filename;
                    $asset->foldername = $asset->foldername;
            }
            $asset->update();
           }
            
        }
            
        return redirect()->route('admin.view_occasions');    
    }
}