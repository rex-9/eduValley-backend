<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    public function get()
    {
        $courses = Course::orderBy('token')->get();

        if (count($courses)) {
            return response()->json($courses);
        } else {
            return ['result' => 'No course yet'];
        }
    }

    public function search($search)
    {
        $course = Course::where("name", "like", "%" . $search . "%")->orWhere('subject', 'LIKE', '%' . $search . '%')->orWhere('grade', 'LIKE', '%' . $search . '%')->orWhere('genre', $search)->get();

        if (count($course)) {
            return response()->json($course);
        } else {
            return response()->json(["search count" => count($course), 'result' => 'Your searching data does not match!!']);
        }
    }

    // New Course
    public function create(Request $request)
    {
        $validator  =   Validator::make($request->all(), [
            "name"  =>  "required",
            "grade"  =>  "required",
            "subject"  =>  "required",
            "image"  =>  "required",
            "token"  =>  "required|unique:courses",
            "price"  =>  "required",
            "teacher_id"  =>  "required",
        ]);

        if ($validator->fails()) {
            return response()->json(["status" => "failed", "validation_errors" => $validator->errors()]);
        }

        $inputs = $request->all();
        $course   =   Course::create($inputs);

        if (!is_null($course)) {
            $course       =       $course = Course::where('name', $request->name)->first();
            return response()->json(["status" => "success", "created" => true, "message" => "Success! New Course added", "The Course is" => $course,]);
        } else {
            return response()->json(["status" => "failed", "message" => "Course Creating failed!"]);
        }
    }

    public function update(Request $request)
    {
        $course = Course::where("id", $request->id)->first();
        if ($course) {
            $course->name = $request->name;
            $course->grade = $request->grade;
            $course->subject = $request->subject;
            $course->image = $request->image;
            $course->token = $request->token;
            $course->price = $request->price;
            $course->zip = $request->zip;
            $course->genre = $request->genre;
            $course->ongoing = $request->ongoing;
            $course->teacher_id = $request->teacher_id;
            $result = $course->save();
            if ($result) {
                return $course;
            } else {
                return ["error"];
            }
        } else {
            return ["course doesn't exist"];
        }
    }
}
