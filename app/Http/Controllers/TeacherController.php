<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    public function get()
    {
        $teachers = Teacher::all();

        if (count($teachers)) {
            return response()->json($teachers);
        } else {
            return ['result' => 'No Teacher yet'];
        }
    }

    public function search(int $id)
    {
        $teacher = Teacher::where("id", $id)->first();

        if ($teacher) {
            return response()->json($teacher);
        } else {
            return response()->json(["search count" => count($teacher), 'result' => 'Your searching data does not match!!']);
        }
    }


    public function searchByRole($role)
    {
        $teacher = Teacher::where('role', $role)->get();

        if (count($teacher)) {
            return response()->json($teacher);
        } else {
            return response()->json(["search count" => count($teacher), 'result' => 'Your searching role does not match!!']);
        }
    }

    public function update(Request $request)
    {
        $teacher = Teacher::where("id", $request->id)->first();
        if ($teacher) {
            $teacher->name = $request->name;
            $teacher->photo = $request->photo;
            $teacher->url = $request->url;
            $teacher->role = $request->role;
            $result = $teacher->save();
            if ($result) {
                return $teacher;
            } else {
                return ["error"];
            }
        } else {
            return ["teacher doesn't exist"];
        }
    }

    // New Teacher
    public function create(Request $request)
    {
        $validator  =   Validator::make($request->all(), [
            "name"  =>  "required|unique:teachers",
            "photo"  =>  "required|unique:teachers",
            "url"  =>  "required|unique:teachers",
        ]);

        if ($validator->fails()) {
            return response()->json(["status" => "failed", "validation_errors" => $validator->errors()]);
        }

        $inputs = $request->all();
        $teacher   =   Teacher::create($inputs);

        if (!is_null($teacher)) {
            $teacher       =       $teacher = Teacher::where('name', $request->name)->first();
            return response()->json(["status" => "success", "created" => true, "message" => "Success! New teacher added", "The teacher is" => $teacher,]);
        } else {
            return response()->json(["status" => "failed", "message" => "Teacher Creating failed!"]);
        }
    }
}
