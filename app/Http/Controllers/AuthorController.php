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
                'authors' => Author::query()
                    ->select('id', 'name', 'created_at')
                    ->orderBy('id', 'desc')
                    ->paginate(10),
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
        $data = validator(
            $request->all(),
            [
                'name' => ['required', 'unique:authors', 'max:40'],
            ]
        )->validate();

        Author::create($data);

        return redirect()->route('authors.index');
    }

    public function show(Author $author)
    {
        return inertia(
            'Author/AuthorShow',
            [
                'author' => [
                    'id' => $author->id,
                    'name' => $author->name,
                ],
            ]
        );
    }

    public function update(Request $request, Author $author)
    {
        $data = $request->validate([
            'name' => ['required', 'unique:authors', 'max:40'],
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
