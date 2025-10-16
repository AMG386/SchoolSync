<?php

namespace App\Http\Controllers\Operations;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Traits\EmployeeTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class EmployeeController extends Controller
{
    use EmployeeTrait;

    // List all employees
    public function index(Request $request)
    {
        $employees = Employee::latest()->paginate(15);
        $this->pageSummaryIndex();
        return view('pages.operations.employees.index', compact('employees'));
    }

    // Show create form
    public function create(Request $request)
    {
        $this->pageSummaryCreate();
        return view('pages.operations.employees.create', [
            'redirect' => $request->redirect ?? ''
        ])->render();
    }

    // Store a new employee
    public function store(Request $request)
    {
        $validated = $request->validate([
            // Basic Information
            'employee_id' => 'required|string|max:50',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|string|max:10',
            'date_of_birth' => 'required|date',
            'age' => 'required|integer|min:0',
            'marital_status' => 'nullable|string|max:50',
            'photo' => 'nullable|string|max:255',

            // Contact Information
            'mobile_number' => 'required|string|max:20',
            'alternate_contact_number' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'address_street' => 'nullable|string|max:255',
            'address_city' => 'nullable|string|max:100',
            'address_state' => 'nullable|string|max:100',
            'address_pincode' => 'nullable|string|max:20',
            'address_country' => 'nullable|string|max:100',
            'emergency_contact_person' => 'nullable|string|max:255',
            'emergency_contact_number' => 'nullable|string|max:20',
            'emergency_contact_relationship' => 'nullable|string|max:100',

            // Job Details
            'department' => 'nullable|string|max:100',
            'designation' => 'nullable|string|max:100',
            'employee_type' => 'nullable|string|max:50',
            'joining_date' => 'nullable|date',
            'probation_end_date' => 'nullable|date',
            'confirmation_date' => 'nullable|date',
            'resignation_termination_date' => 'nullable|date',
            'reporting_manager' => 'nullable|string|max:255',
            'employee_status' => 'nullable|string|max:50',

            // Official Details
            'work_email' => 'nullable|email|max:255',
            'work_phone_extension' => 'nullable|string|max:20',
            'employee_code' => 'nullable|string|max:50',
            'shift' => 'nullable|string|max:50',
            'office_location' => 'nullable|string|max:100',

            // Salary & Payroll
            'basic_salary' => 'nullable|numeric|min:0',
            'allowances' => 'nullable|numeric|min:0',
            'deductions' => 'nullable|numeric|min:0',
            'net_salary' => 'nullable|numeric|min:0',
            'bank_name' => 'nullable|string|max:100',
            'bank_account_number' => 'nullable|string|max:50',
            'ifsc_swift_code' => 'nullable|string|max:50',
            'pan_tax_id' => 'nullable|string|max:50',
            'payroll_cycle' => 'nullable|string|max:50',

            // Identification & Documents
            'aadhaar_national_id' => 'nullable|string|max:20',
            'pan_number' => 'nullable|string|max:20',
            'passport_number' => 'nullable|string|max:20',
            'driving_license_number' => 'nullable|string|max:20',
            'voter_id' => 'nullable|string|max:20',
            'uploaded_documents' => 'nullable|string',

            // Employment History
            'previous_company_name' => 'nullable|string|max:255',
            'previous_job_title' => 'nullable|string|max:100',
            'previous_experience' => 'nullable|string|max:100',
            'reason_for_leaving' => 'nullable|string|max:255',

            // Other Information
            'skills' => 'nullable|string',
            'certifications' => 'nullable|string',
            'languages_known' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);
    

        $employee = Employee::create($validated);
        
        return Response::json([
            'Status'      => 'Success',
            'Msg'         => 'Employee Saved Successfully',
            'RedirectUrl' => ($request->redirecturl) ? url($request->redirecturl) : route('employees.show', $employee->id),
        ], 201);
    }

    // Show a single employee
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        $this->pageSummaryShow($employee);
        return view('pages.operations.employees.show', compact('employee'));
    }

    // Show edit form
    public function edit(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $this->pageSummaryEdit($employee);
        return view('pages.operations.employees.edit', [
            'employee' => $employee,
            'redirect' => $request->redirect ?? '',
        ])->render();
    }

    // Update an employee
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $validated = $request->validate([
            // Basic Information
            'employee_id' => 'sometimes|required|string|max:50',
            'first_name' => 'sometimes|required|string|max:255',
            'last_name' => 'sometimes|required|string|max:255',
            'gender' => 'sometimes|required|string|max:10',
            'date_of_birth' => 'sometimes|required|date',
            'age' => 'sometimes|required|integer|min:0',
            'marital_status' => 'nullable|string|max:50',
            'photo' => 'nullable|string|max:255',

            // Contact Information
            'mobile_number' => 'sometimes|required|string|max:20',
            'alternate_contact_number' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'address_street' => 'nullable|string|max:255',
            'address_city' => 'nullable|string|max:100',
            'address_state' => 'nullable|string|max:100',
            'address_pincode' => 'nullable|string|max:20',
            'address_country' => 'nullable|string|max:100',
            'emergency_contact_person' => 'nullable|string|max:255',
            'emergency_contact_number' => 'nullable|string|max:20',
            'emergency_contact_relationship' => 'nullable|string|max:100',

            // Job Details
            'department' => 'nullable|string|max:100',
            'designation' => 'nullable|string|max:100',
            'employee_type' => 'nullable|string|max:50',
            'joining_date' => 'nullable|date',
            'probation_end_date' => 'nullable|date',
            'confirmation_date' => 'nullable|date',
            'resignation_termination_date' => 'nullable|date',
            'reporting_manager' => 'nullable|string|max:255',
            'employee_status' => 'nullable|string|max:50',

            // Official Details
            'work_email' => 'nullable|email|max:255',
            'work_phone_extension' => 'nullable|string|max:20',
            'employee_code' => 'nullable|string|max:50',
            'shift' => 'nullable|string|max:50',
            'office_location' => 'nullable|string|max:100',
            'login_user_id' => 'nullable|string|max:100',
            'login_password' => 'nullable|string|max:255',

            // Salary & Payroll
            'basic_salary' => 'nullable|numeric|min:0',
            'allowances' => 'nullable|numeric|min:0',
            'deductions' => 'nullable|numeric|min:0',
            'net_salary' => 'nullable|numeric|min:0',
            'bank_name' => 'nullable|string|max:100',
            'bank_account_number' => 'nullable|string|max:50',
            'ifsc_swift_code' => 'nullable|string|max:50',
            'pan_tax_id' => 'nullable|string|max:50',
            'payroll_cycle' => 'nullable|string|max:50',

            // Identification & Documents
            'aadhaar_national_id' => 'nullable|string|max:20',
            'pan_number' => 'nullable|string|max:20',
            'passport_number' => 'nullable|string|max:20',
            'driving_license_number' => 'nullable|string|max:20',
            'voter_id' => 'nullable|string|max:20',
            'uploaded_documents' => 'nullable|string',

            // Employment History
            'previous_company_name' => 'nullable|string|max:255',
            'previous_job_title' => 'nullable|string|max:100',
            'previous_experience' => 'nullable|string|max:100',
            'reason_for_leaving' => 'nullable|string|max:255',

            // Other Information
            'skills' => 'nullable|string',
            'certifications' => 'nullable|string',
            'languages_known' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);
        

        $employee->update($validated);

        return Response::json([
            'Status'      => 'Success',
            'Msg'         => 'Employee Updated Successfully',
            'RedirectUrl' => ($request->redirecturl) ? url($request->redirecturl) : route('employees.show', $employee->id),
        ]);
    }

    // Delete an employee
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return Response::json([
            'Status'      => 'Success',
            'Msg'         => 'Employee deleted Successfully',
            'RedirectUrl' => route('employees.index'),
        ]);
    }
}