<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return inertia(
            'Book/BookIndex',
            [
                'books' => Book::all(),
            ]
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'unique:books'],
            'publisher' => ['required'],
            'edition' => ['required', 'integer'],
            'publication_year' => ['required'],
        ]);

        Book::create($data);

        return redirect()->route('books.index');
    }

    public function show(Book $book)
    {
        return inertia(
            'Book/BookShow',
            [
                'book' => $book,
            ]
        );
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

        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index');
    }
}
