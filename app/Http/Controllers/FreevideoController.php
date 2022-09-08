<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Freevideo;
use App\Models\Audio;
use App\Models\Video;
use App\Models\Book;
use App\Models\Course;
use App\Models\Minivideo;
use App\Models\Poster;
use App\Models\Teacher;
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

    public function domainChange()
    {
        $audios = Audio::all();
        if ($audios) {
            foreach ($audios as $audio) {
                $audio->url = str_replace("rextutor.manishchudasama.com", "eduvalley.co.ke/assets", $audio->url);
                $result = $audio->save();
            }
            if ($result) {
                $audio;
            } else {
                ["error"];
            }
        } else {
            ["audio doesn't exist"];
        }

        $books = Book::all();
        if ($books) {
            foreach ($books as $book) {
                $book->url = str_replace("http://", "https://", $book->url);
                $result = $book->save();
            }
            if ($result) {
                $book;
            } else {
                ["error"];
            }
        } else {
            ["book doesn't exist"];
        }

        $courses = Course::all();
        if ($courses) {
            foreach ($courses as $course) {
                $course->image = str_replace("rextutor.manishchudasama.com", "eduvalley.co.ke/assets", $course->image);
                $result = $course->save();
            }
            if ($result) {
                $course;
            } else {
                ["error"];
            }
        } else {
            ["course doesn't exist"];
        }

        $minivideos = Minivideo::all();
        if ($minivideos) {
            foreach ($minivideos as $minivideo) {
                $minivideo->parent = str_replace("rextutor.manishchudasama.com", "eduvalley.co.ke/assets", $minivideo->parent);
                $result = $minivideo->save();
            }
            if ($result) {
                $minivideo;
            } else {
                ["error"];
            }
        } else {
            ["minivideo doesn't exist"];
        }

        $posters = Poster::all();
        if ($posters) {
            foreach ($posters as $poster) {
                $poster->url = str_replace("rextutor.manishchudasama.com", "eduvalley.co.ke/assets", $poster->url);
                $result = $poster->save();
            }
            if ($result) {
                $poster;
            } else {
                ["error"];
            }
        } else {
            ["poster doesn't exist"];
        }

        $teachers = Teacher::all();
        if ($teachers) {
            foreach ($teachers as $teacher) {
                $teacher->photo = str_replace("rextutor.manishchudasama.com", "eduvalley.co.ke/assets", $teacher->photo);
                $result = $teacher->save();
            }
            if ($result) {
                $teacher;
            } else {
                ["error"];
            }
        } else {
            ["teacher doesn't exist"];
        }

        $videos = Video::all();
        if ($videos) {
            foreach ($videos as $video) {
                $video->parent = str_replace("rextutor.manishchudasama.com", "eduvalley.co.ke/assets", $video->parent);
                $result = $video->save();
            }
            if ($result) {
                $video;
            } else {
                ["error"];
            }
        } else {
            ["video doesn't exist"];
        }

        $freevideos = Freevideo::all();
        if ($freevideos) {
            foreach ($freevideos as $freevideo) {
                $freevideo->url = str_replace("rextutor.manishchudasama.com", "eduvalley.co.ke/assets", $freevideo->url);
                $result = $freevideo->save();
            }
            if ($result) {
                $freevideo;
            } else {
                ["error"];
            }
        } else {
            ["freevideo doesn't exist"];
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
