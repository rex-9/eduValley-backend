<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Comment;
use App\Models\User;

class CommentController extends Controller
{

    public function get()
    {
        $comments = Comment::all();

        if (count($comments)) {
            return response()->json($comments);
        } else {
            return ['result' => 'No Comment yet'];
        }
    }

    public function getbyAd($ad_id)
    {
        $comments = Comment::where('ad_id', $ad_id)->orderBy('created_at', 'desc')->get();

        if (count($comments)) {
            return response()->json($comments);
        } else {
            return 0;
        }
    }

    public function getbyUser($user_id)
    {
        $comments = Comment::where('user_id', $user_id)->get();

        if (count($comments)) {
            return response()->json($comments);
        } else {
            return ['result' => 'No Comment yet'];
        }
    }

    public function getbyUserAndAd($user_id, $ad_id)
    {
        $comment = Comment::where('user_id', $user_id)->where('ad_id', $ad_id)->get();

        if (count($comment)) {
            return 1;
        } else {
            return 0;
        }
    }

    public function userCommentedAds($user_id)
    {
        if (Comment::exists()) {
            return  User::find($user_id)->comments->pluck('ad_id')->all();
        } else {
            return ['No commented ad yet.'];
        }
    }

    public function create(Request $request)
    {
        $validator  =   Validator::make($request->all(), [
            "content"  =>  "required",
            "ad_id"  =>  "required",
            "user_id"  =>  "required",
        ]);

        if ($validator->fails()) {
            return response()->json(["status" => "failed", "validation_errors" => $validator->errors()]);
        }

        $existingComment = Comment::where('content', $request->content)->where('ad_id', $request->ad_id)->where('user_id', $request->user_id)->first();
        if ($existingComment) {
            return response()->json(["status" => "failure", "reason" => "Duplicate comment."]);
        } else {
            $inputs = $request->all();
            $comment = Comment::create($inputs);
            if ($comment) {
                return response()->json(["status" => "success", "created" => true, "message" => "Success! New comment added", "The comment is" => $comment,]);
            } else {
                return response()->json(["status" => "failed", "message" => "Failed to add comment!"]);
            }
        }
    }

    public function update(Request $request)
    {
        $comment = Comment::where("id", $request->id)->first();
        if ($comment) {
            $comment->content = $request->content;
            $result = $comment->save();
            if ($result) {
                return $comment;
            } else {
                return ["error"];
            }
        } else {
            return ["comment doesn't exist"];
        }
    }

    public function delete($id)
    {
        $comment = Comment::where("id", $id)->first();
        if ($comment) {
            $comment->delete();
            return ["deleted" => $comment];
        } else {
            return [$id => "This comment doesn't exist"];
        }
    }
}
