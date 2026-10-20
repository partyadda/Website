<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cake;
use App\Models\branch;
use App\Models\asset;
class cakeController extends Controller
{
    public function index(){
        // $branch = branch::find($id);

        // // Get all decorations for this branch
        // $cakes = $branch->cakes()->where('branch_cake.enabled',1)->orderBy('branch_cake.sequence','ASC')->get();
        
        // $assets = asset::whereIn('lookup_id', $cakes->pluck('id'))->where('lookup_data', 'cake')->get();
        //     $cakesWithAssets = $cakes->map(function($cake) use ($assets) {
        //         // Filter assets related to this decoration
        //         $cake->assets = $assets->where('lookup_id', $cake->id)->sortby('sequenceno');
        //         return $cake;
        //     });
        
        
        // $cake = cake::where('status',1)->get();
        // return view('select-cake')->with('cake',$cake);
        return view('add_cake');
    }
    public function category(Request $request){
        // return $request;
        if($request->selectedValue == 'egless'){
            // $price = cake::pluck('egless_price');
            $price = cake::select('name as name','egless_price as price','id','image')->where('status',1)->get();
        }
        else{
            $price = cake::select('name as name','price as price','id','image')->where('status',1)->get();
        }
        return response()->json($price);
    }
    public function create(Request $request)
    {
        $cake = new cake();
        $cake->cakename	=  $request->cakename;
        if($cake->save()){
            $id = $cake->id;
            $asset = new asset();
            $asset->lookup_id = $id;
            $asset->lookup_data = "cake";
            $asset->description = $cake->cakename;
            $asset->asset_type = "image";
            // Handle file upload if there's an image
            if ($request->hasFile("photo")) {
                $filename = time() . "." . $request->photo->extension();
                $request->photo->move(public_path("assets/img/cake"), $filename);
                $asset->filename = $filename;
                $asset->foldername = "cake";
            }
            $asset->save();
        }
        
        
        return redirect()->route("admin.view_cakes");
    }
    public function view()
    {
        $cakes = cake::get();
        $assets = asset::whereIn('lookup_id', $cakes->pluck('id'))->where('lookup_data', 'cake')->get();
            $cakesWithAssets = $cakes->map(function($cake) use ($assets) {
                // Filter assets related to this decoration
                $cake->assets = $assets->where('lookup_id', $cake->id)->sortby('sequenceno');
                return $cake;
            });
            
            // dd($cakesWithAssets);
        return view("view_cakes", compact("cakes",'cakesWithAssets'));

    } 
    public function cake($id){
        $cake = cake::find($id);
         $asset = asset::where("lookup_id", $id)
            ->where("lookup_data", "cake")
            ->first();
            
        return view('add_cake',compact(['cake','asset']));    
    }
    
    public function update(Request $request ,$id){
        
         $cake = cake::find($id);
         $cake->cakename = $request->cakename;
        if($cake->update()){
            // if(empty($request->photo)){
            //     // dd('yes');
            //     // $id = $cake->id;
            // $asset = asset::where('lookup_id',$id)->first();
            // // dd($asset);
            // $asset->lookup_data = "cake";
            // $asset->description = $cake->cakename;
            // $asset->asset_type = "image";
            // // Handle file upload if there's an image
            // // if ($request->hasFile("photo")) {
                
            //     $asset->filename = $asset->filename;
            //     $asset->foldername = "cake";
            // // }
            // $asset->update();
            // }
            // else{
                $asset = asset::where('lookup_id',$id)->where('lookup_data','cake')->first();
                $asset->lookup_data = "cake";
                $asset->description = $cake->cakename;
                $asset->asset_type = "image";
                if ($request->hasFile("photo")) {
                    $filename = time() . "." . $request->photo->extension();
                    $request->photo->move(public_path("assets/img/cake"), $filename);
                    $asset->filename = $filename;
                    $asset->foldername = "cake";
                }
                else{
                  $asset->filename = $asset->filename;
                    $asset->foldername = $asset->foldername;
                }
                $asset->update();
            // }
            return redirect()->route('admin.view_cakes');
        }     
    
    }
}
