<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Audio;
use Illuminate\Support\Facades\Validator;

class AudioController extends Controller
{
    public function get()
    {
        $audio = Audio::all();

        if (count($audio)) {
            return response()->json($audio);
        } else {
            return ['result' => 'No audio yet'];
        }
    }

    public function search(int $id)
    {
        $audio = Audio::where("course_id", $id)->get();

        if ($audio) {
            return response()->json($audio);
        } else {
            return response()->json(["search count" => count($audio), 'result' => 'Your searching data does not match!!']);
        }
    }

    // public function searchUrlsTitles(int $id)
    // {
    //     $urls = Audio::where("course_id", $id)->pluck('url');
    //     $titles = Audio::where("course_id", $id)->pluck('title');

    //     if ($urls) {
    //         return response()->json(['url' => $urls, 'title' => $titles]);
    //     } else {
    //         return response()->json(["search count" => count($urls), 'result' => 'Your searching data does not match!!']);
    //     }
    // }

    public function update(Request $request)
    {
        $audio = Audio::where("id", $request->id)->first();
        if ($audio) {
            $audio->url = $request->url;
            $audio->title = $request->title;
            $audio->course_id = $request->course_id;
            $result = $audio->save();
            if ($result) {
                return $audio;
            } else {
                return ["error"];
            }
        } else {
            return ["audio doesn't exist"];
        }
    }

    // New Audio
    public function create(Request $request)
    {
        $validator  =   Validator::make($request->all(), [
            "url"  =>  "required|unique:audio",
            "title"  =>  "required|unique:audio",
            "course_id"  =>  "required",
        ]);

        if ($validator->fails()) {
            return response()->json(["status" => "failed", "validation_errors" => $validator->errors()]);
        }

        $inputs = $request->all();
        $audio   =   Audio::create($inputs);

        if (!is_null($audio)) {
            $audio       =       $audio = Audio::where('url', $request->url)->first();
            return response()->json(["status" => "success", "created" => true, "message" => "Success! New Audio added", "The Audio is" => $audio,]);
        } else {
            return response()->json(["status" => "failed", "message" => "Audio Creating failed!"]);
        }
    }
}
