<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Star;
use App\Models\User;

class StarController extends Controller
{

    public function get()
    {
        $stars = Star::all();

        if (count($stars)) {
            return response()->json($stars);
        } else {
            return ['result' => 'No Star yet'];
        }
    }

    public function getbyAd($id)
    {
        $stars = Star::where('ad_id', $id)->get();

        if (count($stars)) {
            return response()->json($stars);
        } else {
            return 0;
        }
    }

    public function getbyUser($id)
    {
        $stars = Star::where('user_id', $id)->get();

        if (count($stars)) {
            return response()->json($stars);
        } else {
            return 0;
        }
    }

    public function getbyUserAndAd($user_id, $ad_id)
    {
        $star = Star::where('user_id', $user_id)->where('ad_id', $ad_id)->get();

        if (count($star)) {
            return 1;
        } else {
            return 0;
        }
    }

    public function userStarredAds($user_id)
    {
        if (Star::exists()) {
            return  User::find($user_id)->stars->pluck('ad_id')->all();
        } else {
            return ['No starred ad yet.'];
        }
    }

    public function star(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "ad_id" => "required",
            "user_id" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json(["status" => "failed", "validation_errors" => $validator->errors()]);
        }
        $starred = Star::where('user_id', $request->user_id)->where('ad_id', $request->ad_id)->first();

        if ($starred) {
            $starred->delete();
            return ["deleted" => $starred];
        } else {
            $inputs = $request->all();
            $star = Star::create($inputs);
            return response()->json(["status" => "success", "created" => true, "message" => "Success! New star added", "The star is" => $star]);
        }
        // if (!is_null($star)) {
        // } else {
        //     return response()->json(["status" => "failed", "message" => "star Creating failed!"]);
        // }
    }

    public function delete($ad_id, $user_id)
    {
        $star = Star::where("ad_id", $ad_id)->where("user_id", $user_id)->first();
        if ($star) {
            $star->delete();
            return ["deleted" => $star];
        } else {
            return ["This star doesn't exist"];
        }
    }
}
