<?php

namespace App\Http\Controllers\Operations;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Traits\StudentTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class StudentController extends Controller
{
    use StudentTrait;

    // List all students
   public function index(Request $request)
{
    $query = Student::query();

    if ($request->filled('search')) {
        $search = $request->search;

        $query->where(function ($q) use ($search) {
            $q->where('first_name', 'like', "%{$search}%")
              ->orWhere('last_name', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%")
              ->orWhere('phone', 'like', "%{$search}%")
              ->orWhere('admission_no', 'like', "%{$search}%");
        });
    }

    $students = $query->latest()->paginate(15)->withQueryString();

    $this->pageSummaryIndex(); 
    return view('pages.operations.students.index', compact('students'));
}

    // Show create form
    public function create(Request $request)
    {
        $this->pageSummaryCreate();
        return view('pages.operations.students.create', [
            'redirect' => $request->redirect ?? ''
        ])->render();
    }

   public function store(Request $request)
{
    $validated = $request->validate([
        'admission_no' => 'required|string|max:50|unique:students,admission_no',
        'first_name' => 'required|string|max:255',
        'last_name' => 'nullable|string|max:255',
        'dob' => 'nullable|date',
        'gender' => 'nullable|string|max:10',
        'email' => 'nullable|email|max:255',
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string|max:255',
        'city' => 'nullable|string|max:100',
        'state' => 'nullable|string|max:100',
        'country' => 'nullable|string|max:100',
        'aadhaar_card' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
        'aadhaar_number' => 'nullable|string|max:20',
        'photo' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
        'admission_date' => 'nullable|date',
        'status' => 'nullable|string|max:50',
        'documents' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
        'remarks' => 'nullable|string',
    ]);
    $validated['status'] = '1';
    $student = Student::create($validated);

    // File handling logic
    $files = ['photo', 'aadhaar_card', 'documents'];
    foreach ($files as $fileField) {
        if ($request->hasFile($fileField)) {
            $file = $request->file($fileField);
            $filename = \Carbon\Carbon::now()->format('YmdHs') . '_' . \Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
            $extension = $file->getClientOriginalExtension();
            $filename = $filename . '.' . $extension;

            $path = "uploads/students/{$student->id}/";
            $fullPath = public_path($path);

            if (!\File::exists($fullPath)) {
                \File::makeDirectory($fullPath, 0777, true);
            }

            $file->move($fullPath, $filename);
            $student->{$fileField} = $path . $filename;
        }
    }

    $student->save();

    return \Response::json([
        'Status' => 'Success',
        'Msg' => 'Student Saved Successfully',
        'RedirectUrl' => ($request->redirecturl) ? url($request->redirecturl) : route('students.show', $student->id),
    ], 201);
}


    // Show a single student
    public function show($id)
    {
        $student = Student::findOrFail($id);
        $this->pageSummaryShow($student);
        return view('pages.operations.students.show', compact('student'));
    }

    // Show edit form
    public function edit(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $this->pageSummaryEdit($student);
        return view('pages.operations.students.edit', [
            'student' => $student,
            'redirect' => $request->redirect ?? '',
        ])->render();
    }

   public function update(Request $request, $id)
{
    $student = Student::findOrFail($id);

    $validated = $request->validate([
        'admission_no' => 'sometimes|required|string|max:50|unique:students,admission_no,' . $student->id,
        'first_name' => 'sometimes|required|string|max:255',
        'last_name' => 'nullable|string|max:255',
        'dob' => 'nullable|date',
        'gender' => 'nullable|string|max:10',
        'email' => 'nullable|email|max:255',
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string|max:255',
        'city' => 'nullable|string|max:100',
        'state' => 'nullable|string|max:100',
        'country' => 'nullable|string|max:100',
        'aadhaar_card' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
        'aadhaar_number' => 'nullable|string|max:20',
        'photo' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
        'admission_date' => 'nullable|date',
        'status' => 'nullable|string|max:50',
        'documents' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
        'remarks' => 'nullable|string',
    ]);

    $student->update($validated);

    // File handling logic
    $files = ['photo', 'aadhaar_card', 'documents'];
    foreach ($files as $fileField) {
        if ($request->hasFile($fileField)) {
            $file = $request->file($fileField);
            $filename = \Carbon\Carbon::now()->format('YmdHs') . '_' . \Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
            $extension = $file->getClientOriginalExtension();
            $filename = $filename . '.' . $extension;

            $path = "uploads/students/{$student->id}/";
            $fullPath = public_path($path);

            if (!\File::exists($fullPath)) {
                \File::makeDirectory($fullPath, 0777, true);
            }

            $file->move($fullPath, $filename);
            $student->{$fileField} = $path . $filename;
        }
    }

    $student->save();

    return \Response::json([
        'Status' => 'Success',
        'Msg' => 'Student Updated Successfully',
        'RedirectUrl' => ($request->redirecturl) ? url($request->redirecturl) : route('students.show', $student->id),
    ]);
}
    // Delete a student
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return Response::json([
            'Status' => 'Success',
            'Msg' => 'Student Deleted Successfully',
            'RedirectUrl' => route('students.index'),
        ]);
    }
}
