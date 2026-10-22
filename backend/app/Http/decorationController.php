<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\decoration;
use App\Models\branch;
use App\Models\asset;
class decorationController extends Controller
{
    public function index($id){
         $branch = branch::find($id);

// Get all addons for this branch
$addons = $branch->addons()
    ->where('branch_addons.enabled', 1)
    ->orderBy('branch_addons.sequence', 'ASC')
    ->get();

// Group addons by category
$groupedAddons = $addons->groupBy('category');

$assets = asset::whereIn('lookup_id', $addons->pluck('id'))->where('lookup_data', 'addon')->get();

$groupedAddonsWithAssets = $groupedAddons->map(function ($addonsInCategory) use ($assets) {
    return $addonsInCategory->map(function ($addon) use ($assets) {
        // Filter assets related to this addon
        $addon->assets = $assets->where('lookup_id', $addon->id)->sortBy('sequenceno');
        return $addon;
    });
});

return view('select-decoration', compact('branch', 'groupedAddonsWithAssets'));
        // $decoration = decoration::where('status',1)->get();
        // return view('select-decoration')->with('decoration',$decoration);
    }
}
