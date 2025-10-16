<?php

namespace App\Http\Controllers\Masters;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Traits\SubjectTrait;

class SubjectController extends Controller
{
    use SubjectTrait;

    public function index(Request $request)
    {
        $query = Subject::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('subject_name', 'like', "%{$search}%")
                  ->orWhere('subject_remarks', 'like', "%{$search}%");
        }

        $subjects = $query->latest()->paginate(15)->withQueryString();

        $this->pageSummaryIndex();
        return view('pages.masters.subjects.index', compact('subjects'));
    }

    public function create(Request $request)
    {
        $this->pageSummaryCreate();
        return view('pages.masters.subjects.create', [
            'redirect' => $request->redirect ?? ''
        ])->render();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject_name' => 'required|string|max:255',
            'subject_remarks' => 'nullable|string',
        ]);

        $subject = Subject::create($validated);

        return Response::json([
            'Status' => 'Success',
            'Msg' => 'Subject Saved Successfully',
            'RedirectUrl' => ($request->redirecturl)
                ? url($request->redirecturl)
                : route('subjects.show', $subject->id),
        ], 201);
    }

    public function show($id)
    {
        $subject = Subject::findOrFail($id);
        $this->pageSummaryShow($subject);
        return view('pages.masters.subjects.show', compact('subject'));
    }

    public function edit(Request $request, $id)
    {
        $subject = Subject::findOrFail($id);
        $this->pageSummaryEdit($subject);

        return view('pages.masters.subjects.edit', [
            'subject' => $subject,
            'redirect' => $request->redirect ?? '',
        ])->render();
    }

    public function update(Request $request, $id)
    {
        $subject = Subject::findOrFail($id);

        $validated = $request->validate([
            'subject_name' => 'sometimes|required|string|max:255',
            'subject_remarks' => 'nullable|string',
        ]);

        $subject->update($validated);

        return Response::json([
            'Status' => 'Success',
            'Msg' => 'Subject Updated Successfully',
            'RedirectUrl' => ($request->redirecturl)
                ? url($request->redirecturl)
                : route('subjects.show', $subject->id),
        ]);
    }

    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();

        return Response::json([
            'Status' => 'Success',
            'Msg' => 'Subject Deleted Successfully',
            'RedirectUrl' => route('subjects.index'),
        ]);
    }
}
