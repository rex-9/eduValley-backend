<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function get()
    {
        $books = Book::all();

        if (count($books)) {
            return response()->json($books);
        } else {
            return ['result' => 'No Book yet'];
        }
    }

    public function search(int $id)
    {
        $book = Book::where("teacher_id", $id)->get();

        if ($book) {
            return response()->json($book);
        } else {
            return response()->json(["search count" => count($book), 'result' => 'Your searching data does not match!!']);
        }
    }

    public function update(Request $request)
    {
        $book = Book::where("id", $request->id)->first();
        if ($book) {
            $book->url = $request->url;
            $book->teacher_id = $request->teacher_id;
            $result = $book->save();
            if ($result) {
                return $book;
            } else {
                return ["error"];
            }
        } else {
            return ["book doesn't exist"];
        }
    }

    // New Book
    public function create(Request $request)
    {
        $validator  =   Validator::make($request->all(), [
            "url"  =>  "required|unique:books",
            "teacher_id"  =>  "required",
        ]);

        if ($validator->fails()) {
            return response()->json(["status" => "failed", "validation_errors" => $validator->errors()]);
        }

        $inputs = $request->all();
        $book   =   Book::create($inputs);

        if (!is_null($book)) {
            $book       =       $book = Book::where('url', $request->url)->first();
            return response()->json(["status" => "success", "created" => true, "message" => "Success! New Book added", "The Book is" => $book,]);
        } else {
            return response()->json(["status" => "failed", "message" => "Book Creating failed!"]);
        }
    }

    public function delete($id)
    {
        $book = Book::where("id", $id)->first();
        if ($book) {
            $book->delete();
            return ["deleted" => $book];
        } else {
            return [$id => "This book doesn't exist"];
        }
    }
}
