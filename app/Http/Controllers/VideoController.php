<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    public function get()
    {
        $videos = Video::all();

        if (count($videos)) {
            return response()->json($videos);
        } else {
            return ['result' => 'No Video yet'];
        }
    }

    public function search(int $id)
    {
        $video = Video::where("course_id", $id)->get();

        if ($video) {
            return response()->json($video);
        } else {
            return response()->json(["search count" => count($video), 'result' => 'Your searching data does not match!!']);
        }
    }

    public function update(Request $request)
    {
        $video = Video::where("id", $request->id)->first();
        if ($video) {
            $video->title = $request->title;
            $video->fileName = $request->fileName;
            $video->thumbName = $request->thumbName;
            $video->parent = $request->parent;
            $video->course_id = $request->course_id;
            $result = $video->save();
            if ($result) {
                return $video;
            } else {
                return ["error"];
            }
        } else {
            return ["video doesn't exist"];
        }
    }

    // New Video
    public function create(Request $request)
    {
        $validator  =   Validator::make($request->all(), [
            "title"  =>  "required|unique:videos",
            "fileName"  =>  "required|unique:videos",
            "parent"  =>  "required",
            "course_id"  =>  "required",
        ]);

        if ($validator->fails()) {
            return response()->json(["status" => "failed", "validation_errors" => $validator->errors()]);
        }

        // $titles = $request->title;

        // foreach ($titles as $title) {

        // }

        // $video = $request->collect('videos')->each(function ($video) {
        //     Video::create($video);
        // });

        $inputs = $request->all();
        $video   =   Video::create($inputs);

        if (!is_null($video)) {
            $video = Video::where('fileName', $request->fileName)->first();
            return response()->json(["status" => "success", "created" => true, "message" => "Success! New Video added", "The Video is" => $video,]);
        } else {
            return response()->json(["status" => "failed", "message" => "Video Creating failed!"]);
        }
    }
}
