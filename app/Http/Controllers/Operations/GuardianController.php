<?php

namespace App\Http\Controllers\Operations;

use App\Http\Controllers\Controller;
use App\Models\Guardian;
use App\Models\Student;
use App\Traits\GuardianTrait;
use Illuminate\Http\Request;
use App\Helpers\Dropdown;
use Illuminate\Support\Facades\Response;

class GuardianController extends Controller
{
    use GuardianTrait;

    // List all guardians
    public function index(Request $request)
    {
        $query = Guardian::with('student');

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('relation', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('mobile_no', 'like', "%{$search}%");
            });
        }

        $guardians = $query->latest()->paginate(15)->withQueryString();

        $this->pageSummaryIndex();
        return view('pages.operations.guardians.index', compact('guardians'));
    }

    public function create(Request $request)
    {
        $students = Dropdown::students();
        $this->pageSummaryCreate();
        return view('pages.operations.guardians.create', [
            'students' => $students,
            'redirect' => $request->redirect ?? ''
        ])->render();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'name' => 'required|string|max:255',
            'relation' => 'nullable|string|max:50',
            'phone' => 'nullable|string|max:20',
            'mobile_no' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'occupation' => 'nullable|string|max:100',
            'address' => 'nullable|string|max:255',
            'remarks' => 'nullable|string',
            'guardian_attachment' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
            'guardian_pic' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
        ]);

        $guardian = Guardian::create($validated);

        $files = ['guardian_attachment', 'guardian_pic'];
        foreach ($files as $fileField) {
            if ($request->hasFile($fileField)) {
                $file = $request->file($fileField);
                $filename = now()->format('YmdHs') . '_' . \Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
                $extension = $file->getClientOriginalExtension();
                $filename .= '.' . $extension;

                $path = "uploads/guardians/{$guardian->id}/";
                $fullPath = public_path($path);

                if (!\File::exists($fullPath)) {
                    \File::makeDirectory($fullPath, 0777, true);
                }

                $file->move($fullPath, $filename);
                $guardian->{$fileField} = $path . $filename;
            }
        }

        $guardian->save();

        return Response::json([
            'Status' => 'Success',
            'Msg' => 'Guardian Saved Successfully',
            'RedirectUrl' => ($request->redirecturl) ? url($request->redirecturl) : route('guardians.show', $guardian->id),
        ], 201);
    }

    
    public function show($id)
    {
        $guardian = Guardian::with('student')->findOrFail($id);
        $this->pageSummaryShow($guardian);
        return view('pages.operations.guardians.show', compact('guardian'));
    }

    public function edit(Request $request, $id)
    {
        $guardian = Guardian::findOrFail($id);
         $students = Dropdown::students();
        $this->pageSummaryEdit($guardian);

        return view('pages.operations.guardians.edit', [
            'guardian' => $guardian,
            'students' => $students,
            'redirect' => $request->redirect ?? '',
        ])->render();
    }

    public function update(Request $request, $id)
    {
        $guardian = Guardian::findOrFail($id);

        $validated = $request->validate([
            'student_id' => 'sometimes|required|exists:students,id',
            'name' => 'sometimes|required|string|max:255',
            'relation' => 'nullable|string|max:50',
            'phone' => 'nullable|string|max:20',
            'mobile_no' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'occupation' => 'nullable|string|max:100',
            'address' => 'nullable|string|max:255',
            'remarks' => 'nullable|string',
            'guardian_attachment' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
            'guardian_pic' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
        ]);

        $guardian->update($validated);

        $files = ['guardian_attachment', 'guardian_pic'];
        foreach ($files as $fileField) {
            if ($request->hasFile($fileField)) {
                $file = $request->file($fileField);
                $filename = now()->format('YmdHs') . '_' . \Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
                $extension = $file->getClientOriginalExtension();
                $filename .= '.' . $extension;

                $path = "uploads/guardians/{$guardian->id}/";
                $fullPath = public_path($path);

                if (!\File::exists($fullPath)) {
                    \File::makeDirectory($fullPath, 0777, true);
                }

                $file->move($fullPath, $filename);
                $guardian->{$fileField} = $path . $filename;
            }
        }

        $guardian->save();

        return Response::json([
            'Status' => 'Success',
            'Msg' => 'Guardian Updated Successfully',
            'RedirectUrl' => ($request->redirecturl) ? url($request->redirecturl) : route('guardians.show', $guardian->id),
        ]);
    }

    public function destroy($id)
    {
        $guardian = Guardian::findOrFail($id);
        $guardian->delete();

        return Response::json([
            'Status' => 'Success',
            'Msg' => 'Guardian Deleted Successfully',
            'RedirectUrl' => route('guardians.index'),
        ]);
    }
}
