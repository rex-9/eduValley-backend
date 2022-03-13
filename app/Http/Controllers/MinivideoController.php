<?php

namespace App\Http\Controllers;

use App\Models\Minivideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MinivideoController extends Controller
{
    public function get()
    {
        $minivideos = Minivideo::where('title', '!=', 'null')->get();

        if (count($minivideos)) {
            return response()->json($minivideos);
        } else {
            return ['result' => 'No Minivideos yet'];
        }
    }

    public function search(int $id)
    {
        $minivideos = Minivideo::where("ad_id", $id)->where('title', '!=', 'null')->get();

        if ($minivideos) {
            return response()->json($minivideos);
        } else {
            return response()->json(['result' => 'Your searching data does not match!!']);
        }
    }

    public function update(Request $request)
    {
        $minivideo = Minivideo::where("id", $request->id)->first();
        if ($minivideo) {
            $minivideo->ad_id = $request->ad_id;
            $minivideo->title = $request->title;
            $minivideo->fileName = $request->fileName;
            $minivideo->thumbName = $request->thumbName;
            $minivideo->parent = $request->parent;
            $result = $minivideo->save();
            if ($result) {
                return $minivideo;
            } else {
                return ["error"];
            }
        } else {
            return ["Minivideos doesn't exist"];
        }
    }

    // New Minivideos
    public function create(Request $request)
    {
        $validator  =   Validator::make($request->all(), [
            "ad_id"  =>  "required",
            "fileName"  =>  "required|unique:minivideos",
        ]);

        if ($validator->fails()) {
            return response()->json(["status" => "failed", "validation_errors" => $validator->errors()]);
        }

        $inputs = $request->all();
        $minivideo   =   Minivideo::create($inputs);

        if (!is_null($minivideo)) {
            return response()->json(["status" => "success", "created" => true, "message" => "Success! New Minivideos added", "The Minivideos is" => $minivideo,]);
        } else {
            return response()->json(["status" => "failed", "message" => "Minivideos Creating failed!"]);
        }
    }
}
