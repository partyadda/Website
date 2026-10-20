<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cake;
use App\Models\branch;
use App\Models\asset;
class cakeController extends Controller
{
    public function index($id)
    {
        $branch = branch::find($id);

        // Get all decorations for this branch
        $cakes = $branch
            ->cakes()
            ->where("branch_cake.enabled", 1)
            ->orderBy("branch_cake.sequence", "ASC")
            ->get();

        $assets = asset::whereIn("lookup_id", $cakes->pluck("id"))
            ->where("lookup_data", "cake")
            ->get();
        $cakesWithAssets = $cakes->map(function ($cake) use ($assets) {
            // Filter assets related to this decoration
            $cake->assets = $assets
                ->where("lookup_id", $cake->id)
                ->sortby("sequenceno");
            return $cake;
        });

        // $cake = cake::where('status',1)->get();
        // return view('select-cake')->with('cake',$cake);
        return view("select-cake", compact("branch", "cakesWithAssets"));
    }
    public function category(Request $request)
    {
        // return $request;
        if ($request->selectedValue == "egless") {
            // $price = cake::pluck('egless_price');
            $price = cake::select(
                "name as name",
                "egless_price as price",
                "id",
                "image"
            )
                ->where("status", 1)
                ->get();
        } else {
            $price = cake::select(
                "name as name",
                "price as price",
                "id",
                "image"
            )
                ->where("status", 1)
                ->get();
        }
        return response()->json($price);
    }
}