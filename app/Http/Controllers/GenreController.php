<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{

    // All Genres
    public function get()
    {
        $genres = Genre::all();

        if (count($genres)) {
            return response()->json($genres);
        } else {
            return ['result' => 'No Genre yet'];
        }
    }

    // pluck Genres
    public function pluck()
    {
        $genres = Genre::pluck('genre');

        if (count($genres)) {
            return response()->json($genres);
        } else {
            return ['result' => 'No Genre yet'];
        }
    }


    // update Genres
    public function update(Request $request)
    {
        $genre = Genre::where("id", $request->id)->first();
        if ($genre) {
            $genre->genre = $request->genre;
            $genre->courses = $request->courses;
            $genre->teachers = $request->teachers;
            $result = $genre->save();
            if ($result) {
                return $genre;
            } else {
                return ["error"];
            }
        } else {
            return ["Genre doesn't exist"];
        }
    }

    // New Genre
    public function create(Request $request)
    {
        $validator  =   Validator::make($request->all(), [
            "genre"  =>  "required|unique:genres",
        ]);

        if ($validator->fails()) {
            return response()->json(["status" => "failed", "validation_errors" => $validator->errors()]);
        }

        $inputs = $request->all();
        $genre   =   Genre::create($inputs);

        if (!is_null($genre)) {
            $genre       =       $genre = Genre::where('genre', $request->genre)->first();
            return response()->json(["status" => "success", "created" => true, "message" => "Success! New Genre added", "The Genre is" => $genre,]);
        } else {
            return response()->json(["status" => "failed", "message" => "Genre Creating failed!"]);
        }
    }
}
