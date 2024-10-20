<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        return inertia(
            'Subject/SubjectIndex',
            [
                'subjects' => Subject::query()
                    ->select('id', 'description', 'created_at')
                    ->orderBy('id', 'desc')
                    ->paginate(10)
                    ->withQueryString(),
            ]
        );
    }

    public function create()
    {
        return inertia(
            'Subject/SubjectCreate',
            [
                'author' => new Subject,
            ]
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'description' => ['required', 'max:20'],
        ]);

        Subject::create($data);

        return redirect()->route('subjects.index');
    }

    public function show(Subject $subject)
    {
        return inertia(
            'Subject/SubjectShow',
            [
                'subject' => $subject,
            ]
        );
    }

    public function update(Request $request, Subject $subject)
    {
        $data = $request->validate([
            'description' => ['required', 'max:20'],
        ]);

        $subject->update($data);

        return redirect()->route('subjects.index');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()->route('subjects.index');
    }
}
