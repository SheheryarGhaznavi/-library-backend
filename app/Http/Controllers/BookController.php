<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class BookController extends Controller
{
    use ApiResponse;

    public function index()
    {
        return Book::whereUserId(1)->get();
    }


    public function create(Request $request)
    {
        $user_id = 1;

        $book = new Book;
        $book->user_id = $user_id;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->genre = $request->genre;
        $book->image = $request->image;
        $book->save();

        return $this->success($book->toArray(), 'Book has been added to library');
    }
}
