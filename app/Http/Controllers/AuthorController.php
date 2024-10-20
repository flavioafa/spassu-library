<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        return Author::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'unique:authors'],
        ]);

        return Author::create($data);
    }

    public function show(Author $author)
    {
        return $author;
    }

    public function update(Request $request, Author $author)
    {
        $data = $request->validate([
            'name' => ['required', 'unique:authors'],
        ]);

        $author->update($data);

        return $author;
    }

    public function destroy(Author $author)
    {
        $author->delete();

        return response()->json();
    }
}
