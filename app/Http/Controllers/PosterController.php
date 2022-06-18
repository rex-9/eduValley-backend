<?php

namespace App\Http\Controllers;

use App\Models\Poster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PosterController extends Controller
{
    public function get()
    {
        $posters = Poster::where('url', '!=', 'null')->get();

        if (count($posters)) {
            return response()->json($posters);
        } else {
            return ['result' => 'No Poster yet'];
        }
    }

    public function searchFirst(int $id)
    {
        $poster = Poster::where("ad_id", $id)->where('url', '!=', 'null')->first();

        if ($poster) {
            return response()->json($poster);
        } else {
            return response()->json(['result' => 'Your searching data does not match!!']);
        }
    }

    public function delete($id)
    {
        $poster = Poster::where("id", $id)->first();
        if ($poster) {
            $poster->delete();
            return ["deleted" => $poster];
        } else {
            return [$id => "This poster doesn't exist"];
        }
    }

    public function search(int $id)
    {
        $poster = Poster::where("ad_id", $id)->where('url', '!=', 'null')->get();

        if ($poster) {
            return response()->json($poster);
        } else {
            return response()->json([ 'result' => 'Your searching data does not match!!']);
        }
    }

    public function update(Request $request)
    {
        $poster = Poster::where("id", $request->id)->first();
        if ($poster) {
            $poster->ad_id = $request->ad_id;
            $poster->url = $request->url;
            $result = $poster->save();
            if ($result) {
                return $poster;
            } else {
                return ["error"];
            }
        } else {
            return ["Poster doesn't exist"];
        }
    }

    // New Poster
    public function create(Request $request)
    {
        $validator  =   Validator::make($request->all(), [
            "ad_id"  =>  "required",
            "url"  =>  "required|unique:posters",
        ]);

        if ($validator->fails()) {
            return response()->json(["status" => "failed", "validation_errors" => $validator->errors()]);
        }

        $inputs = $request->all();
        $poster   =   Poster::create($inputs);

        if (!is_null($poster)) {
            return response()->json(["status" => "success", "created" => true, "message" => "Success! New Poster added", "The Poster is" => $poster]);
        } else {
            return response()->json(["status" => "failed", "message" => "Poster Creating failed!"]);
        }
    }
}
