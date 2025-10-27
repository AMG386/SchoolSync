<?php

namespace App\Http\Controllers\Masters;

use App\Http\Controllers\Controller;
use App\Models\ClassSubject;
use App\Models\SchoolClass;
use App\Models\Subject;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Helpers\Dropdown;

class ClassSubjectController extends Controller
{
   
 public function create($schoolclass_id, Request $request)
{
    $schoolclass = SchoolClass::findOrFail($schoolclass_id);
    $subjects = Subject::pluck('subject_name', 'id');

    $teachers = Dropdown::teachers();

    return view('pages.masters.classsubjects.create', [
        'schoolclass' => $schoolclass,
        'subjects' => $subjects,
        'teachers' => $teachers,
        'redirect' => $request->redirect ?? ''
    ])->render();
}

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'school_class_id' => 'required|exists:school_classes,id',
            'subject_id' => 'required|exists:subjects,id',
            'teacher_id' => 'nullable|exists:employees,id',
        ]);

        $classSubject = ClassSubject::create($validated);

        return Response::json([
            'Status' => 'Success',
            'Msg' => 'Class Subject Saved Successfully',
            'RedirectUrl' => ($request->redirecturl)
                ? url($request->redirecturl)
                : route('classsubjects.show', $classSubject->id),
        ], 201);
    }


   public function edit(Request $request, $id)
{
    $classSubject = ClassSubject::findOrFail($id); 
    $subjects = Subject::pluck('subject_name', 'id'); 
    $teachers = Dropdown::teachers(); 
    $redirect = $request->redirect ?? '';

    return view('pages.masters.classsubjects.edit', compact(
        'classSubject', 'subjects', 'teachers', 'redirect'
    ))->render();
}


   
    public function update(Request $request, $id)
    {
        $classSubject = ClassSubject::findOrFail($id);

        $validated = $request->validate([
            'school_class_id' => 'sometimes|required|exists:school_classes,id',
            'subject_id' => 'sometimes|required|exists:subjects,id',
            'teacher_id' => 'nullable|exists:employees,id',
        ]);

        $classSubject->update($validated);

        return Response::json([
            'Status' => 'Success',
            'Msg' => 'Class Subject Updated Successfully',
            'RedirectUrl' => ($request->redirecturl)
                ? url($request->redirecturl)
                : route('classsubjects.show', $classSubject->id),
        ]);
    }

   
}
