<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        return Subject::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'description' => ['required', 'unique:subjects'],
        ]);

        return Subject::create($data);
    }

    public function show(Subject $subject)
    {
        return $subject;
    }

    public function update(Request $request, Subject $subject)
    {
        $data = $request->validate([
            'description' => ['required', 'unique:subjects'],
        ]);

        $subject->update($data);

        return $subject;
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();

        return response()->json();
    }
}
