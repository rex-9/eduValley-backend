<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Freevideo;
use Illuminate\Support\Facades\Validator;

class FreevideoController extends Controller
{
    public function get()
    {
        $freevideos = Freevideo::all();

        if (count($freevideos)) {
            return response()->json($freevideos);
        } else {
            return ['result' => 'No Freevideo yet'];
        }
    }

    public function search(int $id)
    {
        $freevideo = Freevideo::where("course_id", $id)->get();

        if ($freevideo) {
            return response()->json($freevideo);
        } else {
            return response()->json(["search count" => count($freevideo), 'result' => 'Your searching data does not match!!']);
        }
    }

    public function update(Request $request)
    {
        $freevideo = Freevideo::where("id", $request->id)->first();
        if ($freevideo) {
            $freevideo->url = $request->url;
            $freevideo->title = $request->title;
            $freevideo->course_id = $request->course_id;
            $result = $freevideo->save();
            if ($result) {
                return $freevideo;
            } else {
                return ["error"];
            }
        } else {
            return ["freevideo doesn't exist"];
        }
    }

    // New Freevideo
    public function create(Request $request)
    {
        $validator  =   Validator::make($request->all(), [
            "url"  =>  "required|unique:freevideos",
            "title"  =>  "required",
            "course_id"  =>  "required",
        ]);

        if ($validator->fails()) {
            return response()->json(["status" => "failed", "validation_errors" => $validator->errors()]);
        }

        $inputs = $request->all();
        $freevideo   =   Freevideo::create($inputs);

        if (!is_null($freevideo)) {
            $freevideo       =       $freevideo = Freevideo::where('url', $request->url)->first();
            return response()->json(["status" => "success", "created" => true, "message" => "Success! New Freevideo added", "The Freevideo is" => $freevideo,]);
        } else {
            return response()->json(["status" => "failed", "message" => "Freevideo Creating failed!"]);
        }
    }
}
