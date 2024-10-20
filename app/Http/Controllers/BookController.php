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
                'books' => Book::query()
                    ->select('id', 'title', 'publisher', 'edition', 'publication_year', 'created_at')
                    ->paginate(10)
                    ->withQueryString(),

            ]
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'max:40'],
            'publisher' => ['required', 'max:40'],
            'edition' => ['required', 'integer'],
            'publication_year' => ['required', 'min:4', 'max:4'],
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
            'title' => ['required', 'max:40'],
            'publisher' => ['required', 'max:40'],
            'edition' => ['required', 'integer'],
            'publication_year' => ['required', 'min:4', 'max:4'],
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
