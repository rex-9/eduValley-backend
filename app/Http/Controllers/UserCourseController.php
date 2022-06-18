<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\UserCourse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserCourseController extends Controller
{
    // To get all courses of a user
    public function getCourses($user_id)
    {
        if (UserCourse::exists()) {
            return User::find($user_id)->courses;
        } else {
            return ['No purchased record yet.'];
        }
    }

    // To get all users by course
    public function getUsers($course_id)
    {
        if (UserCourse::exists()) {
            return Course::find($course_id)->users;
        } else {
            return ['No purchased record yet.'];
        }
    }

    public function pluckCourseIds($user_id)
    {
        if (UserCourse::exists()) {
            return User::find($user_id)->courses->pluck('id')->all();
        } else {
            return ['No purchased record yet.'];
        }
    }

    public function allRecords()
    {
        return UserCourse::all();
    }

    public function recordsByUserCourse($user_id, $course_id)
    {
        $record = UserCourse::where('user_id', $user_id)->where('course_id', $course_id)->first();
        return $record;
    }

    public function attach($user_id, $course_id)
    {
        $user = User::find($user_id);
        $course = Course::find($course_id);
        $record = UserCourse::where('user_id', $user->id)->where('course_id', $course_id)->first();
        if ($record) {
            return response()->json(["status" => "failure", "because" => "$user->name already have access to $course->name"]);
        } else {
            $user->courses()->attach($course_id, ['day' => Carbon::now()->format('d'), 'month' => Carbon::now()->format('M'), 'year' => Carbon::now()->format('Y'), 'paid' => $course->price * 0.6]);
            $purchasedCourse = Course::find($course_id);
            $purchasedCourse->students = count($purchasedCourse->users);
            $purchasedCourse->save();
            return response()->json(["status" => "success", "success" => "Gave $user->name access to $course->name", "record" => $record]);
        }
    }

    public function detach($user_id, $course_id)
    {
        $user = User::find($user_id);
        $course = Course::find($course_id);
        $record = UserCourse::where('user_id', $user->id)->where('course_id', $course_id)->first();
        if ($record) {
            $user->courses()->detach($course_id);
            $purchasedCourse = Course::find($course_id);
            $purchasedCourse->students = count($purchasedCourse->users);
            $purchasedCourse->save();
            return response()->json(["status" => "success", "success" => "Detached $course->name from $user->name"]);
        } else {
            return response()->json(["status" => "failure", "because" => "$user->name didn't have access to $course->name from the start."]);
        }
    }

    public function allAccess(Request $request)
    {

        $users = User::all();
        $course = Course::where('id', $request->course_id)->first();

        foreach ($users as $user) {
            if (UserCourse::exists()) {
                $record = UserCourse::where('user_id', $user->id)->where('course_id', $request->course_id)->first();
                if (is_null($record)) {
                    $courseId = $request->course_id;
                    $user->courses()->attach($courseId, ['day' => Carbon::now()->format('d'), 'month' => Carbon::now()->format('M'), 'year' => Carbon::now()->format('Y'), 'paid' => $course->price * 0.6]);
                    $purchasedCourse = Course::find($courseId);
                    $purchasedCourse->students = count($purchasedCourse->users);
                    $purchasedCourse->save();
                    continue;
                } else {
                    continue;
                }
            } else {
                $courseId = $request->course_id;
                $user->courses()->attach($courseId, ['day' => Carbon::now()->format('d'), 'month' => Carbon::now()->format('M'), 'year' => Carbon::now()->format('Y'), 'paid' => $course->price * 0.6]);
                $purchasedCourse = Course::find($courseId);
                $purchasedCourse->students = count($purchasedCourse->users);
                $purchasedCourse->save();
                continue;
            }
        }
    }
}

