<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Subject;
use Barryvdh\DomPDF\Facade\Pdf;
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

    public function reportBook($id)
    {
        $pdf = Pdf::loadView('book-report', ['books' => $this->getBookDetails($id)]);

        return $pdf->download('relatorio.pdf');
    }

    public function reportAll()
    {
        $pdf = Pdf::loadView('book-report', ['books' => $this->getBookDetails()]);

        return $pdf->download('relatorio.pdf');
    }

    private function getBookDetails(string $id = ''): array
    {
        $books = \DB::table('book_details')
            ->select(
                [
                    'book_id',
                    'book_title',
                    'book_publisher',
                    'book_price',
                    'book_edition',
                    'book_publication_year',
                    'author_id',
                    'author_name',
                    'subject_id',
                    'subject_description',
                ]
            )
            ->when($id, fn ($query) => $query->where('book_id', $id))
            ->orderBy('book_id')
            ->orderBy('author_name')
            ->get();

        $books = $books->groupBy('book_id');

        $books
            ->transform(
                fn ($book) => [
                    'id' => $book->first()->book_id,
                    'title' => $book->first()->book_title,
                    'publisher' => $book->first()->book_publisher,
                    'price' => $book->first()->book_price,
                    'edition' => $book->first()->book_edition,
                    'publication_year' => $book->first()->book_publication_year,
                    'authors' => $book->pluck(['author_name'])->unique()->values()->toArray(),
                    'subjects' => $book->pluck(['subject_description'])->unique()->values()->toArray(),
                ]
            );

        return $books->toArray();
    }
}
