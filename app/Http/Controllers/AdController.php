<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class AdController extends Controller
{

    public function get()
    {
        $allAds = Ad::getQuery()->orderBy('serial')->where('name', '!=', 'null')->get();

        if (count($allAds)) {
            return response()->json($allAds);
        } else {
            return ['result' => 'No Ad yet'];
        }
    }

    // pluck Categories
    public function pluckCategories()
    {
        $categories = Ad::where('name', '!=', 'null')->distinct()->pluck('category');

        if (count($categories)) {
            return response()->json($categories);
        } else {
            return ['result' => 'No Category yet'];
        }
    }

    //search Ads
    public function search($category)
    {
        $ad = Ad::getQuery()->orderBy('serial')->where("category", $category)->where('name', '!=', 'null')->get();

        if (count($ad)) {
            return response()->json($ad);
        } else {
            return response()->json(["search count" => count($ad), 'result' => 'Your searching data does not match!!']);
        }
    }

    // New Ad
    public function create(Request $request)
    {
        $validator  =   Validator::make($request->all(), [
            "serial"  =>  "required",
            "name"  =>  "required|unique:ads",
        ]);

        if ($validator->fails()) {
            return response()->json(["status" => "failed", "validation_errors" => $validator->errors()]);
        }

        $inputs = $request->all();
        $ad   =   Ad::create($inputs);

        if (!is_null($ad)) {
            $ad       =       $ad = Ad::where('name', $request->name)->first();
            return response()->json(["status" => "success", "created" => true, "message" => "Success! New Ad added", "The Ad is" => $ad,]);
        } else {
            return response()->json(["status" => "failed", "message" => "Ad Creating failed!"]);
        }
    }

    public function update(Request $request)
    {
        $ad = Ad::where("id", $request->id)->first();
        if ($ad) {
            $ad->serial = $request->serial;
            $ad->name = $request->name;
            $ad->site = $request->site;
            $ad->expire = $request->expire;
            $ad->category = $request->category;
            $result = $ad->save();
            if ($result) {
                return $ad;
            } else {
                return ["error"];
            }
        } else {
            return ["Ad doesn't exist"];
        }
    }


    public function kill()
    {
        foreach (Ad::all() as $ad) {
            if (Carbon::now()->toDateString() == $ad->expire) {
                $ad->serial = 0;
                $ad->name = "null";
                $ad->site = "null";
                $ad->expire = "expired";
                $ad->category = "null";
                $result = $ad->save();
                if ($result) {
                    return ["killed this one" => $ad];
                } else {
                    return ["error"];
                }
            }
        }
    }
}
