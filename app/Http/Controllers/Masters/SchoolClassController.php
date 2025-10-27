<?php

namespace App\Http\Controllers\Masters;

use App\Http\Controllers\Controller;
use App\Models\SchoolClass;
use App\Traits\SchoolClassTrait;
use Illuminate\Http\Request;
use App\Helpers\Dropdown;
use Illuminate\Support\Facades\Response;

class SchoolClassController extends Controller
{   use SchoolClassTrait;
    
    public function index(Request $request)
    {
        $query = SchoolClass::query();
      

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('class_name', 'like', "%{$search}%")
                  ->orWhere('division', 'like', "%{$search}%")
                  ->orWhere('class_teacher', 'like', "%{$search}%");
            });
        }

        $schoolclasses = $query->latest()->paginate(15)->withQueryString();

        $this->pageSummaryIndex();
        return view('pages.masters.schoolclasses.index', compact('schoolclasses',));
    }

    // Create view
    public function create(Request $request)
    {
        $this->pageSummaryCreate();
        $teachers = Dropdown::teachers();
        $class=Dropdown::schoolClasses();
        return view('pages.masters.schoolclasses.create', [
            'redirect' => $request->redirect ?? ''
            ,'teachers' => $teachers,
            'class' => $class,
        ])->render();
    }

    // Store new record
    public function store(Request $request)
    {
        $validated = $request->validate([
            'class_name' => 'required|string|max:255',
            'division' => 'required|string|max:100',
            'class_teacher' => 'required|string',
            'accademic_year' => 'required|string',
        ]);

        $schoolclass = SchoolClass::create($validated);

        return Response::json([
            'Status' => 'Success',
            'Msg' => 'Class Saved Successfully',
            'RedirectUrl' => ($request->redirecturl)
                ? url($request->redirecturl)
                : route('schoolclasses.show', $schoolclass->id),
        ], 201);
    }

    public function show($id)
{
    
    $schoolclass = SchoolClass::with([
        'classSubjects.subject',
        'classSubjects.teacher',
        'classTeacherRelation'
    ])->findOrFail($id);

    $classSubjects = $schoolclass->classSubjects;

    $this->pageSummaryShow($schoolclass);

    return view('pages.masters.schoolclasses.show', compact('schoolclass', 'classSubjects'));
}


    // Edit view
    public function edit(Request $request, $id)
    {
        $schoolclass = SchoolClass::findOrFail($id);
        $this->pageSummaryEdit($schoolclass);
         $teachers = Dropdown::teachers();
         $class=Dropdown::schoolClasses();

        return view('pages.masters.schoolclasses.edit', [
            'schoolclass' => $schoolclass,
            'teachers' => $teachers,
            'class' => $class,
            'redirect' => $request->redirect ?? '',
        ])->render();
    }

    // Update record
    public function update(Request $request, $id)
    {
        $schoolclass = SchoolClass::findOrFail($id);

        $validated = $request->validate([
            'class_name' => 'sometimes|required|string|max:255',
            'division' => 'required|string|max:100',
            'class_teacher' => 'required|string',
            'accademic_year' => 'required|string',
        ]);

        $schoolclass->update($validated);

        return Response::json([
            'Status' => 'Success',
            'Msg' => 'Class Updated Successfully',
            'RedirectUrl' => ($request->redirecturl)
                ? url($request->redirecturl)
                : route('schoolclasses.show', $schoolclass->id),
        ]);
    }

    // Delete record
    public function destroy($id)
    {
        $schoolclass = SchoolClass::findOrFail($id);
        $schoolclass->delete();

        return Response::json([
            'Status' => 'Success',
            'Msg' => 'Class Deleted Successfully',
            'RedirectUrl' => route('schoolclasses.index'),
        ]);
    }
}
