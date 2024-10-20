<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Subject;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return inertia(
            'Book/BookIndex',
            [
                'books' => Book::query()
                    ->select('id', 'title', 'publisher', 'price', 'edition', 'publication_year', 'created_at')
                    ->orderBy('id', 'desc')
                    ->paginate(10)
                    ->withQueryString(),

            ]
        );
    }

    public function create()
    {
        return inertia(
            'Book/BookCreate',
            [
                'book' => new Book,
                'authors' => Author::query()
                    ->select('id', 'name')
                    ->orderBy('name')
                    ->get(),
                'subjects' => Subject::query()
                    ->select('id', 'description')
                    ->orderBy('description')
                    ->get(),
            ]
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'max:40'],
            'publisher' => ['required', 'max:40'],
            'price' => ['required'],
            'edition' => ['required', 'integer'],
            'publication_year' => ['required', 'min:4', 'max:4'],
            'authors' => ['required', 'array'],
            'subjects' => ['required', 'array'],
        ]);

        $book = Book::create($data);
        $book->authors()->sync($data['authors']);
        $book->subjects()->sync($data['subjects']);

        return redirect()->route('books.index');
    }

    public function show(Book $book)
    {
        $book->load(
            [
                'authors' => fn ($query) => $query->select('authors.id', 'name'),
                'subjects' => fn ($query) => $query->select('subjects.id', 'description'),
            ]
        );

        return inertia(
            'Book/BookShow',
            [
                'book' => $book->only('id', 'title', 'publisher', 'price', 'edition', 'publication_year', 'created_at', 'authors', 'subjects'),
                'authors' => Author::query()
                    ->select('id', 'name')
                    ->orderBy('name')
                    ->get(),
                'subjects' => Subject::query()
                    ->select('id', 'description')
                    ->orderBy('description')
                    ->get(),
            ]
        );
    }

    public function update(Request $request, Book $book)
    {
        $data = $request->validate([
            'title' => ['required', 'max:40'],
            'publisher' => ['required', 'max:40'],
            'price' => ['required'],
            'edition' => ['required', 'integer'],
            'publication_year' => ['required', 'min:4', 'max:4'],
            'authors' => ['required', 'array'],
            'subjects' => ['required', 'array'],
        ]);

        $book->update($data);
        $book->authors()->sync($data['authors']);
        $book->subjects()->sync($data['subjects']);

        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index');
    }

    public function report($id)
    {
        dd(
            \DB::table('book_details')
                ->select('title', 'publisher', 'price', 'edition', 'publication_year', 'author', 'subject')
                ->where('id', $id)
                ->first()
        );
    }
}
