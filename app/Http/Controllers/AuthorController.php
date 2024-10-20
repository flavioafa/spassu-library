<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        return inertia(
            'Author/AuthorIndex',
            [
                'authors' => Author::all(),
            ]
        );
    }

    public function create()
    {
        return inertia(
            'Author/AuthorCreate',
            [
                'author' => new Author,
            ]
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'unique:authors'],
        ]);

        Author::create($data);

        return redirect()->route('authors.index');
    }

    public function show(Author $author)
    {
        return inertia(
            'Author/AuthorShow',
            [
                'author' => $author,
            ]
        );
    }

    public function update(Request $request, Author $author)
    {
        $data = $request->validate([
            'name' => ['required', 'unique:authors'],
        ]);

        $author->update($data);

        return redirect()->route('authors.index');
    }

    public function destroy(Author $author)
    {
        $author->delete();

        return redirect()->route('authors.index');
    }
}
