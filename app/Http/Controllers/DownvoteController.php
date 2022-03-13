<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Downvote;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class DownvoteController extends Controller
{

    public function get()
    {
        $downvotes = Downvote::all();

        if (count($downvotes)) {
            return response()->json($downvotes);
        } else {
            return ['result' => 'No downvote yet'];
        }
    }

    public function getbyComment($id)
    {
        $downvotes = Downvote::where('comment_id', $id)->get();

        if (count($downvotes)) {
            return response()->json($downvotes);
        } else {
            return 0;
        }
    }

    public function getbyUser($id)
    {
        $downvotes = Downvote::where('user_id', $id)->get();

        if (count($downvotes)) {
            return response()->json($downvotes);
        } else {
            return 0;
        }
    }

    public function getbyUserAndComment($user_id, $comment_id)
    {
        $downvote = Downvote::where('user_id', $user_id)->where('comment_id', $comment_id)->get();

        if (count($downvote)) {
            return 1;
        } else {
            return 0;
        }
    }

    public function userDownvotedComments($user_id)
    {
        if (Downvote::exists()) {
            return  User::find($user_id)->downvotes->pluck('comment_id')->all();
        } else {
            return ['No downvoted comment yet.'];
        }
    }

    public function Downvote(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "comment_id" => "required",
            "user_id" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json(["status" => "failed", "validation_errors" => $validator->errors()]);
        }
        $downvoted = Downvote::where('user_id', $request->user_id)->where('comment_id', $request->comment_id)->first();

        if ($downvoted) {
            $downvoted->delete();
            return ["deleted" => $downvoted];
        } else {
            $inputs = $request->all();
            $downvote = Downvote::create($inputs);
            return response()->json(["status" => "success", "created" => true, "message" => "Success! New downvote added.", "The downvote is" => $downvote]);
        }
        // if (!is_null($downvote)) {
        // } else {
        //     return response()->json(["status" => "failed", "message" => "downvote Creating failed!"]);
        // }
    }

    public function delete($comment_id, $user_id)
    {
        $downvote = Downvote::where("comment_id", $comment_id)->where("user_id", $user_id)->first();
        if ($downvote) {
            $downvote->delete();
            return ["deleted" => $downvote];
        } else {
            return ["This downvote doesn't exist"];
        }
    }
}
