<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\occasion;
use App\Models\branch;
use App\Models\asset;
class occasionController extends Controller
{
    public function index($id){
        $branch = branch::find($id);

        // Get all decorations for this branch
        $decorations = $branch->decorations()->orderBy('sequence')->get();
        // $occasion =  occasion::where('status',1)->get();
        $assets = asset::whereIn('lookup_id', $decorations->pluck('id'))->where('lookup_data', 'decoration')->get();
        
        $decorationsWithAssets = $decorations->map(function($decoration) use ($assets) {
    // Filter assets related to this decoration
    $decoration->assets = $assets->where('lookup_id', $decoration->id)->sortBy('sequenceno');
    return $decoration;
});
// dd($decorationsWithAssets);
        return view('select-occasion',compact('branch','decorationsWithAssets'));
        // return view('select-occasion')->with('occasion',$occasion);
    }
    
    public function decoration_type(Request $request){
        // return $request;
        $type = occasion::select('person1','person2')->where('id',$request->decoration_id)->first();
        return response()->json($type);
    }
}
