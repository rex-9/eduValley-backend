<?php

namespace App\Http\Controllers;

use App\Models\Upvote;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Request;

class UpvoteController extends Controller
{
    public function get()
    {
        $upvotes = Upvote::all();

        if (count($upvotes)) {
            return response()->json($upvotes);
        } else {
            return ['result' => 'No upvote yet'];
        }
    }

    public function getbyComment($id)
    {
        $upvotes = Upvote::where('comment_id', $id)->get();

        if (count($upvotes)) {
            return response()->json($upvotes);
        } else {
            return 0;
        }
    }

    public function getbyUser($id)
    {
        $upvotes = Upvote::where('user_id', $id)->get();

        if (count($upvotes)) {
            return response()->json($upvotes);
        } else {
            return 0;
        }
    }

    public function getbyUserAndComment($user_id, $comment_id)
    {
        $upvote = Upvote::where('user_id', $user_id)->where('comment_id', $comment_id)->get();

        if (count($upvote)) {
            return 1;
        } else {
            return 0;
        }
    }

    public function userUpvotedComments($user_id)
    {
        if (Upvote::exists()) {
            return  User::find($user_id)->upvotes->pluck('comment_id')->all();
        } else {
            return ['No upvoted comment yet.'];
        }
    }

    public function Upvote(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "comment_id" => "required",
            "user_id" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json(["status" => "failed", "validation_errors" => $validator->errors()]);
        }
        $upvoted = Upvote::where('user_id', $request->user_id)->where('comment_id', $request->comment_id)->first();

        if ($upvoted) {
            $upvoted->delete();
            return ["deleted" => $upvoted];
        } else {
            $inputs = $request->all();
            $upvote = Upvote::create($inputs);
            return response()->json(["status" => "success", "created" => true, "message" => "Success! New upvote added.", "The upvote is" => $upvote]);
        }
        // if (!is_null($upvote)) {
        // } else {
        //     return response()->json(["status" => "failed", "message" => "pvote Creating failed!"]);
        // }
    }

    public function delete($comment_id, $user_id)
    {
        $upvote = Upvote::where("comment_id", $comment_id)->where("user_id", $user_id)->first();
        if ($upvote) {
            $upvote->delete();
            return ["deleted" => $upvote];
        } else {
            return ["This upvote doesn't exist"];
        }
    }
}
