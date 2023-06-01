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
        return $this->success(Book::whereUserId(auth()->id())->get()->toArray());
    }


    public function create(Request $request)
    {
        $book = new Book;
        $book->user_id = auth()->id();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->genre = $request->genre;
        $book->image = $request->image;
        $book->save();

        return $this->success($book->toArray(), 'Book has been added to library');
    }


    public function updateReadability(Request $request)
    {
        if (Book::whereId($request->id)->update(['is_read' => $request->read])) {
            return $this->success([], 'Updated');
        }
        return $this->success([], 'Not Updated');
    }
}
