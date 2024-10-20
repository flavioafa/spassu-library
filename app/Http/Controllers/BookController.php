<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return Book::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'unique:books'],
            'publisher' => ['required'],
            'edition' => ['required', 'integer'],
            'publication_year' => ['required'],
        ]);

        return Book::create($data);
    }

    public function show(Book $book)
    {
        return $book;
    }

    public function update(Request $request, Book $book)
    {
        $data = $request->validate([
            'title' => ['required', 'unique:books'],
            'publisher' => ['required'],
            'edition' => ['required', 'integer'],
            'publication_year' => ['required'],
        ]);

        $book->update($data);

        return $book;
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return response()->json();
    }
}
