<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\city;
use App\Models\branch;
use App\Models\slot;
use App\Models\theatre;
use App\Models\theatre_slot;
use App\Models\asset;
// use Illuminate\Support\Str;

class TheatreController extends Controller
{
    public function index()
    {
        $city = city::where("enabled", 1)->get();
        $slot = slot::where("enabled", 1)
            ->orderByRaw("FIELD(DayPart, 'M', 'A', 'E')")
            ->get();
        return view("add_theater", compact("city", "slot"));
    }

    public function city_branch(Request $request)
    {
        // echo $request->city_id;
        $branch = branch::where("city_id", $request->city_id)->get();
        return response()->json($branch);
    }

    public function create(Request $request)
    {
        // return $request;
        if ($request->enabled == "") {
            $publish = 0;
        } else {
            $publish = 1;
        }

        $theatre = new theatre();
        $theatre->name = $request->name;
        $theatre->price = $request->price;
        $theatre->extra_person_price = $request->extra_person_price;
        $theatre->displayname = $request->displayname;
        $theatre->description = $request->description;
        $theatre->max_people = $request->max_people;
        $theatre->peopleallowed = $request->peopleallowed;
        $theatre->branch_id = $request->branch_id;
        $theatre->audiodetails = $request->audiodetails;
        $theatre->videodetails = $request->videodetails;
        $theatre->decoration_included = $request->decoration_included;
        $theatre->status = $publish;
        if ($theatre->save()) {
            $theatre_id = $theatre->id;
            for ($i = 0; $i < count($request->slot_id); $i++) {
                $theatre_slot = new theatre_slot();
                //  dd($data['addon_amount']);
                $theatre_slot->theatre_id = $theatre_id;
                $theatre_slot->slot_id = $request->slot_id[$i];
                $theatre_slot->enabled = 1;
                $theatre_slot->sequence = 1;
                $theatre_slot->save();
            }
            return redirect()->route("admin.view_theatres");
        }
    }

    public function view()
    {
        $theatre = theatre::where("deleted_at", "=", null)
            ->with([
                "branchs" => function ($query) {
                    $query
                        ->select(
                            "id",
                            "city_id",
                            "advance_amount",
                            "decoration_amount",
                            "cancellation_terms",
                            "branch_name"
                        )
                        ->with([
                            "city" => function ($cityQuery) {
                                $cityQuery->select("id", "city_name"); // Ensure you're selecting 'id' and not 'city_id'
                            },
                        ]);
                },
                "slots" => function ($query) {
                    $query
                        ->where("theatre_slot.enabled", 1)
                        ->orderBy("theatre_slot.sequence");
                },
            ])
            ->get();

        // dd($theatre);
        return view("view_theatres", compact("theatre"));
    }

    public function edit($id)
    {
        $theatre = theatre::where("id", $id)
            ->with([
                "branchs" => function ($query) {
                    $query
                        ->select(
                            "id",
                            "city_id",
                            "advance_amount",
                            "decoration_amount",
                            "cancellation_terms",
                            "branch_name"
                        )
                        ->with([
                            "city" => function ($cityQuery) {
                                $cityQuery->select("id", "city_name"); // Ensure you're selecting 'id' and not 'city_id'
                            },
                        ]);
                },
                "slots" => function ($query) {
                    $query
                        ->where("theatre_slot.enabled", 1)
                        ->orderBy("theatre_slot.sequence");
                },
            ])
            ->first();
        // dd($theatre);
        $city = city::where("enabled", 1)->get();
        $slot = slot::where("enabled", 1)
            ->orderByRaw("FIELD(DayPart, 'M', 'A', 'E')")
            ->get();

        return view("edit_theater", compact("theatre", "city", "slot"));
    }

    public function update(Request $request, $id)
    {
        if ($request->has("enabled")) {
            $publish = $request->input("enabled"); // Will be '1' if checked
        } else {
            $publish = 0; // Default value when unchecked
        }

        // return $publish;

        $theatre = theatre::where("id", $id)->update([
            "name" => $request->name,
            "price" => $request->price,
            "extra_person_price" => $request->extra_person_price,
            "displayname" => $request->displayname,
            "description" => $request->description,
            "max_people" => $request->max_people,
            "peopleallowed" => $request->peopleallowed,
            "branch_id" => $request->branch_id,
            "audiodetails" => $request->audiodetails,
            "videodetails" => $request->videodetails,
            "decoration_included" => $request->decoration_included,
            "status" => $publish,
            // Add other fields that need to be updated
        ]);

        if ($theatre) {
            $delete_Slot = theatre_slot::where("theatre_id", $id)->delete();
            if ($delete_Slot) {
                // dd('yes');
                //
                for ($i = 0; $i < count($request->slot_id); $i++) {
                    $theatre_slot = new theatre_slot();
                    $theatre_slot->theatre_id = $id;
                    $theatre_slot->slot_id = $request->slot_id[$i];
                    $theatre_slot->enabled = 1;
                    $theatre_slot->sequence = 1;
                    $theatre_slot->save();
                }
            } else {
                for ($i = 0; $i < count($request->slot_id); $i++) {
                    $theatre_slot = new theatre_slot();
                    $theatre_slot->theatre_id = $id;
                    $theatre_slot->slot_id = $request->slot_id[$i];
                    $theatre_slot->enabled = 1;
                    $theatre_slot->sequence = 1;
                    $theatre_slot->save();
                }
            }
            // for($i = 0 ; $i < count($request->slot_id); $i++){

            //     $theatre =theatre_slot::where('theatre_id', $id)->update([
            //         'slot_id' => $request->slot_id[$i],
            //         ]);
            // }
            return redirect()->route("admin.view_theatres");
        }

        // $theatre = theatre::findOrFail($id);

        // $theatre->name = $request->name;
        // $theatre->price = $request->price;
        // $theatre->extra_person_price = $request->extra_person_price;
        // $theatre->displayname = $request->displayname;
        // $theatre->description = $request->description;
        // $theatre->max_people = $request->max_people;
        // $theatre->peopleallowed = $request->peopleallowed;
        // $theatre->branch_id = $request->branch_id;
        // $theatre->audiodetails = $request->audiodetails;
        // $theatre->videodetails = $request->videodetails;
        // $theatre->decoration_included = $request->decoration_included;
        // $theatre->status = $publish;
        // if($theatre->update()){
        //      for($i = 0 ; $i < count($request->slot_id); $i++){
        //     $theatre_slot = theatre_slot::where('theatre_id',$id);
        //     $theatre_slot->slot_id = $request->slot_id[$i];
        //     $theatre_slot->update();
        //      }
        //     return redirect()->route('admin.view_theatres');
        // }

        // @dd($theatre);
    }

    public function status($id, $status)
    {
        // dd($id);
        $theatre = theatre::where("id", $id)->update([
            "status" => $status,
        ]);
        return redirect()->back();
    }

    public function delete($id)
    {
        // dd($id);
        //  $theatre_slot= theatre_slot::where('theatre_id', $id)->delete();

        // if($theatre_slot){
        //   $theatre= theatre::where('id', $id)->delete();
        // }

        DB::transaction(function () use ($id) {
            // Soft delete entries from theatre_slot first
            theatre_slot::where("theatre_id", $id)->delete();

            // Soft delete the theatre entry
            theatre::where("id", $id)->delete();
        });
        return redirect()->back();
    }

    public function image($id)
    {
        // $id = $id;
        //  $asset_data = asset::where('lookup_id', $id)->first();
        $theatre = theatre::where("id", $id)->first();
        $asset = asset::where("lookup_id", $id)
            ->where("lookup_data", "theatre")
            ->get();
        // dd($asset);
        return view("theatreImages", compact("asset", "id", "theatre"));
    }

    public function edit_asset($id, $asset_id)
    {
        $asset = asset::where("lookup_id", $id)
            ->where("lookup_data", "theatre")
            ->get(); // Fetch all assets again
        $asset_data = asset::where("id", $asset_id)->first();
        return view("theatreImages", compact("asset", "asset_data", "id"));
    }

    public function insert_asset(Request $request, $id)
    {
        // return $request;
        $theatre = theatre::select("name")
            ->where("id", $id)
            ->first();
        // dd($theatre->name);

        $asset = new asset();
        $asset->lookup_id = $id;
        $asset->lookup_data = "theatre";
        $asset->description = $theatre->name;
        $asset->sequenceno = $request->input("sequenceno");
        $asset->asset_type = "image";
        $asset->enabled = $request->input("enabled");
        // Handle file upload if there's an image
        if ($request->hasFile("image")) {
            $filename = time() . "." . $request->image->extension();
            $request->image->move(public_path("assets/img/theatre"), $filename);
            $asset->filename = $filename;
            $asset->foldername = "theatre";
        }

        $asset->save();

        return redirect()
            ->route("admin.image", $id)
            ->with("success", "Asset inserted successfully");
    }

    public function update_asset(Request $request, $id, $asset_id)
    {
        $asset = asset::find($asset_id);
        // dd($asset);
        // if($asset->sequenceno == $request->input('sequenceno')){
        //     return redirect()->route('admin.image', $id,$asset_id)->with('error', 'This Sequence No Already User');
        // }
        // else{
        $asset->sequenceno = $request->input("sequenceno");
        $asset->enabled = $request->input("enabled");
        // Handle file upload if there's a new image
        if ($request->hasFile("image")) {
            $filename = time() . "." . $request->image->extension();
            $request->image->move(public_path("assets/img/theatre"), $filename);
            $asset->filename = $filename;
            $asset->foldername = "theatre";
        } else {
            // $filename = time() . '.' . $request->image->extension();
            // $request->image->move(public_path('assets/img/.$asset->foldername.'), $asset->filename);
            $asset->filename = $asset->filename;
            $asset->foldername = $asset->foldername;
        }

        $asset->save();

        return redirect()
            ->route("admin.image", $id)
            ->with("success", "Asset updated successfully");
        // }
    }

    public function asset_status($ass_id, $id)
    {
        // dd($id);
        $asset = asset::where("id", $ass_id)->first();
        // dd($asset);
        if ($asset->enabled == 1) {
            // dd('yes');
            $asset = asset::where("id", $ass_id)->update([
                "enabled" => 0,
            ]);
        } else {
            // dd('no');
            $asset = asset::where("id", $ass_id)->update([
                "enabled" => 1,
            ]);
        }

        return redirect()->route("admin.image", $id);
    }
}