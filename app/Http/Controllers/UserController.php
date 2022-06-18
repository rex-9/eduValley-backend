<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserController extends Controller
{

    public function total()
    {
        $users = User::all();
        return response()->json(["totalUsers" => count($users), "users" => $users]);
    }

    public function search($idOremail)
    {
        $user = User::where("email", "like", "%" . $idOremail . "%")->orWhere('id', $idOremail)->get();

        if (count($user)) {
            return $user;
            // return response()->json(["search count" => count($user), "data" => $user]);
        } else {
            return response()->json(['result' => 'Your searching data does not match!!']);
        }
    }

    public function delete($email)
    {
        $user = User::where("email", $email)->first();
        if ($user) {
            $user->delete();
            return ["deleted" => $user];
        } else {
            return [$email => "This email doesn't exist"];
        }
    }

    // User Register
    public function register(Request $request)
    {
        $validator  =   Validator::make($request->all(), [
            "name"  =>  "required",
            "email"  =>  "required|email|unique:users",
            "phone"  =>  "required",
            "password"  =>  "required",
        ]);

        if ($validator->fails()) {
            return response()->json(["status" => "failed", "validation_errors" => $validator->errors()]);
        }

        $inputs = $request->all();
        $inputs["password"] = Hash::make($request->password);
        $user   =   User::create($inputs);
        $user->courses()->attach([1, 3], ['day' => Carbon::now()->format('d'), 'month' => Carbon::now()->format('M'), 'year' => Carbon::now()->format('Y')]);
        $freeCourses = Course::find([1, 3]);
        foreach ($freeCourses as $freeCourse) {
            $freeCourse->students = count($freeCourse->users);
            $freeCourse->save();
        }

        if (!is_null($user)) {
            $user = User::where('email', $request->email)->first();
            $token      =       $user->createToken($request->email)->plainTextToken;
            return response()->json(["status" => "success", "login" => true, "token" => $token, "message" => "Success! registration completed", "data" => $user,]);
        } else {
            return response()->json(["status" => "failed", "message" => "Registration failed!"]);
        }
    }

    // User login
    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            "email" =>  "required|email",
            "password" =>  "required",
        ]);

        if ($validator->fails()) {
            return response()->json(["validation_errors" => $validator->errors()]);
        }

        $user = User::where("email", $request->email)->first();

        if (is_null($user)) {
            return response()->json(["status" => "failed", "message" => "Failed! email not found"]);
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            Auth::logoutOtherDevices($request->password);
            $user       =       $user = User::where('email', $request->email)->first();
            $user->tokens()->delete();
            $token      =       $user->createToken($request->email)->plainTextToken;

            return response()->json(["status" => "success", "login" => true, "token" => $token, "data" => $user]);
        } else {
            return response()->json(["status" => "failed", "success" => false, "message" => "Whoops! invalid password"]);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'status' => "success",
            'message' => 'Logout successful',
        ]);
    }

    // User Detail
    public function current()
    {
        $user       =       Auth::user();
        if (!is_null($user)) {
            return response()->json(["status" => "success", "currentUser" => $user]);
        } else {
            return response()->json(["status" => "failed", "message" => "Whoops! no user found"]);
        }
    }


    public function getMetta()
    {
        $user = User::where("metta", 1)->get();

        if (count($user)) {
            return response()->json(["Metta count" => count($user), "data" => $user]);
        } else {
            return ['result' => 'No metta yet'];
        }
    }

    public function updateMetta(Request $request)
    {
        $user = User::where("email", $request->email)->first();
        if ($user) {
            $user->metta = $request->metta;
            $result = $user->save();
            if ($result) {
                return $user;
            } else {
                return ["error"];
            }
        } else {
            return ["User doesn't exist"];
        }
    }
}
