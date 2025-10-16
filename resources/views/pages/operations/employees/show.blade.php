@extends('layouts.app')

@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div id="employee_show">
                <div id="employee_show-content">

                    <div class="card shadow-sm mb-5">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bold text-gray-900 mb-1">
                                        {{ $employee->first_name ?? '-' }} {{ $employee->last_name ?? '' }}
                                    </h3>
                                    <div class="text-muted">Employee ID: {{ $employee->employee_id ?? '-' }}</div>
                                    <div class="text-muted">Contact No: {{ $employee->mobile_number ?? '-' }}</div>
                                    <div class="text-muted">Email: {{ $employee->email ?? '-' }}</div>
                                </div>
                                <div class="d-flex gap-2">
                                    @if($employee->photo)
                                        <img src="{{ asset('storage/' . $employee->photo) }}" alt="Photo" width="60" class="rounded-circle">
                                    @endif
                                </div>
                            </div>

                            <div class="separator my-4"></div>

                            {{-- Tabs --}}
                            <ul class="nav nav-tabs mb-4" id="employeeTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="personal-tab" data-bs-toggle="tab" data-bs-target="#personal" type="button" role="tab">Personal</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="job-tab" data-bs-toggle="tab" data-bs-target="#job" type="button" role="tab">Job</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="salary-tab" data-bs-toggle="tab" data-bs-target="#salary" type="button" role="tab">Salary & Bank</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="documents-tab" data-bs-toggle="tab" data-bs-target="#documents" type="button" role="tab">Documents</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="other-tab" data-bs-toggle="tab" data-bs-target="#other" type="button" role="tab">Other</button>
                                </li>
                            </ul>

                            <div class="tab-content" id="employeeTabContent">
                                {{-- Personal Tab --}}
                                <div class="tab-pane fade show active" id="personal" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <span class="fw-semibold text-muted">Gender</span>
                                                <p class="fw-bold text-gray-900 mb-0"> {{ config('constants.gender')[$employee->gender] ?? '-' }}</p>
                                            </div>
                                            <div class="mb-4">
                                                <span class="fw-semibold text-muted">Date of Birth</span>
                                                <p class="fw-bold text-gray-900 mb-0">{{ $employee->date_of_birth ?? '-' }}</p>
                                            </div>
                                            <div class="mb-4">
                                                <span class="fw-semibold text-muted">Age</span>
                                                <p class="fw-bold text-gray-900 mb-0">{{ $employee->age ?? '-' }}</p>
                                            </div>
                                            <div class="mb-4">
                                                <span class="fw-semibold text-muted">Marital Status</span>
                                                <p class="fw-bold text-gray-900 mb-0">{{ config('constants.martial_status')[$employee->marital_status] ?? '-' }}</p>
                                            </div>
                                            <div class="mb-4">
                                                <span class="fw-semibold text-muted">Alternate Contact Number</span>
                                                <p class="fw-bold text-gray-900 mb-0">{{ $employee->alternate_contact_number ?? '-' }}</p>
                                            </div>
                                            <div class="mb-4">
                                                <span class="fw-semibold text-muted">Emergency Contact Person</span>
                                                <p class="fw-bold text-gray-900 mb-0">{{ $employee->emergency_contact_person ?? '-' }}</p>
                                            </div>
                                            <div class="mb-4">
                                                <span class="fw-semibold text-muted">Emergency Contact Number</span>
                                                <p class="fw-bold text-gray-900 mb-0">{{ $employee->emergency_contact_number ?? '-' }}</p>
                                            </div>
                                            <div class="mb-4">
                                                <span class="fw-semibold text-muted">Emergency Contact Relationship</span>
                                                <p class="fw-bold text-gray-900 mb-0">{{ $employee->emergency_contact_relationship ?? '-' }}</p>
                                            </div>
                                            <div class="mb-4">
                                                <span class="fw-semibold text-muted">Address</span>
                                                <p class="fw-bold text-gray-900 mb-0">
                                                    {{ $employee->address_street ?? '' }},
                                                    {{ $employee->address_city ?? '' }},
                                                    {{ $employee->address_state ?? '' }},
                                                    {{ $employee->address_pincode ?? '' }},
                                                    {{ $employee->address_country ?? '' }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <span class="fw-semibold text-muted">Work Email</span>
                                                <p class="fw-bold text-gray-900 mb-0">{{ $employee->work_email ?? '-' }}</p>
                                            </div>
                                            <div class="mb-4">
                                                <span class="fw-semibold text-muted">Work Phone Extension</span>
                                                <p class="fw-bold text-gray-900 mb-0">{{ $employee->work_phone_extension ?? '-' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Job Tab --}}
                                <div class="tab-pane fade" id="job" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <span class="fw-semibold text-muted">Department</span>
                                                <p class="fw-bold text-gray-900 mb-0">{{ $employee->department ?? '-' }}</p>
                                            </div>
                                            <div class="mb-4">
                                                <span class="fw-semibold text-muted">Designation</span>
                                                <p class="fw-bold text-gray-900 mb-0">{{ $employee->designation ?? '-' }}</p>
                                            </div>
                                            <div class="mb-4">
                                                <span class="fw-semibold text-muted">Employee Type</span>
                                                <p class="fw-bold text-gray-900 mb-0">{{ $employee->employee_type ?? '-' }}</p>
                                            </div>
                                            <div class="mb-4">
                                                <span class="fw-semibold text-muted">Joining Date</span>
                                                <p class="fw-bold text-gray-900 mb-0">{{ $employee->joining_date ?? '-' }}</p>
                                            </div>
                                            <div class="mb-4">
                                                <span class="fw-semibold text-muted">Probation End Date</span>
                                                <p class="fw-bold text-gray-900 mb-0">{{ $employee->probation_end_date ?? '-' }}</p>
                                            </div>
                                            <div class="mb-4">
                                                <span class="fw-semibold text-muted">Confirmation Date</span>
                                                <p class="fw-bold text-gray-900 mb-0">{{ $employee->confirmation_date ?? '-' }}</p>
                                            </div>
                                            <div class="mb-4">
                                                <span class="fw-semibold text-muted">Resignation/Termination Date</span>
                                                <p class="fw-bold text-gray-900 mb-0">{{ $employee->resignation_termination_date ?? '-' }}</p>
                                            </div>
                                            <div class="mb-4">
                                                <span class="fw-semibold text-muted">Reporting Manager</span>
                                                <p class="fw-bold text-gray-900 mb-0">{{ $employee->reporting_manager ?? '-' }}</p>
                                            </div>
                                            <div class="mb-4">
                                                <span class="fw-semibold text-muted">Employee Status</span>
                                                <p class="fw-bold text-gray-900 mb-0">{{ $employee->employee_status ?? '-' }}</p>
                                            </div>
                                            <div class="mb-4">
                                                <span class="fw-semibold text-muted">Employee Code</span>
                                                <p class="fw-bold text-gray-900 mb-0">{{ $employee->employee_code ?? '-' }}</p>
                                            </div>
                                            <div class="mb-4">
                                                <span class="fw-semibold text-muted">Shift</span>
                                                <p class="fw-bold text-gray-900 mb-0">{{ $employee->shift ?? '-' }}</p>
                                            </div>
                                            <div class="mb-4">
                                                <span class="fw-semibold text-muted">Office Location</span>
                                                <p class="fw-bold text-gray-900 mb-0">{{ $employee->office_location ?? '-' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Salary & Bank Tab --}}
                                <div class="tab-pane fade" id="salary" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <span class="fw-semibold text-muted">Basic Salary</span>
                                                <p class="fw-bold text-gray-900 mb-0">{{ $employee->basic_salary ?? '-' }}</p>
                                            </div>
                                            <div class="mb-4">
                                                <span class="fw-semibold text-muted">Allowances</span>
                                                <p class="fw-bold text-gray-900 mb-0">{{ $employee->allowances ?? '-' }}</p>
                                            </div>
                                            <div class="mb-4">
                                                <span class="fw-semibold text-muted">Deductions</span>
                                                <p class="fw-bold text-gray-900 mb-0">{{ $employee->deductions ?? '-' }}</p>
                                            </div>
                                            <div class="mb-4">
                                                <span class="fw-semibold text-muted">Net Salary</span>
                                                <p class="fw-bold text-gray-900 mb-0">{{ $employee->net_salary ?? '-' }}</p>
                                            </div>
                                            <div class="mb-4">
                                                <span class="fw-semibold text-muted">Payroll Cycle</span>
                                                <p class="fw-bold text-gray-900 mb-0">{{ $employee->payroll_cycle ?? '-' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <span class="fw-semibold text-muted">Bank Name</span>
                                                <p class="fw-bold text-gray-900 mb-0">{{ $employee->bank_name ?? '-' }}</p>
                                            </div>
                                            <div class="mb-4">
                                                <span class="fw-semibold text-muted">Bank Account Number</span>
                                                <p class="fw-bold text-gray-900 mb-0">{{ $employee->bank_account_number ?? '-' }}</p>
                                            </div>
                                            <div class="mb-4">
                                                <span class="fw-semibold text-muted">IFSC/SWIFT Code</span>
                                                <p class="fw-bold text-gray-900 mb-0">{{ $employee->ifsc_swift_code ?? '-' }}</p>
                                            </div>
                                            <div class="mb-4">
                                                <span class="fw-semibold text-muted">PAN/Tax ID</span>
                                                <p class="fw-bold text-gray-900 mb-0">{{ $employee->pan_tax_id ?? '-' }}</p>
                                            </div>
                                            <div class="mb-4">
                                                <span class="fw-semibold text-muted">Aadhaar/National ID</span>
                                                <p class="fw-bold text-gray-900 mb-0">{{ $employee->aadhaar_national_id ?? '-' }}</p>
                                            </div>
                                            <div class="mb-4">
                                                <span class="fw-semibold text-muted">PAN Number</span>
                                                <p class="fw-bold text-gray-900 mb-0">{{ $employee->pan_number ?? '-' }}</p>
                                            </div>
                                            <div class="mb-4">
                                                <span class="fw-semibold text-muted">Passport Number</span>
                                                <p class="fw-bold text-gray-900 mb-0">{{ $employee->passport_number ?? '-' }}</p>
                                            </div>
                                            <div class="mb-4">
                                                <span class="fw-semibold text-muted">Driving License Number</span>
                                                <p class="fw-bold text-gray-900 mb-0">{{ $employee->driving_license_number ?? '-' }}</p>
                                            </div>
                                            <div class="mb-4">
                                                <span class="fw-semibold text-muted">Voter ID</span>
                                                <p class="fw-bold text-gray-900 mb-0">{{ $employee->voter_id ?? '-' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Documents Tab --}}
                                <div class="tab-pane fade" id="documents" role="tabpanel">
                                    <div class="mb-4">
                                        <span class="fw-semibold text-muted">Uploaded Documents</span>
                                        <p class="fw-bold text-gray-900 mb-0">{{ $employee->uploaded_documents ?? '-' }}</p>
                                    </div>
                                </div>
                                {{-- Other Tab --}}
                                <div class="tab-pane fade" id="other" role="tabpanel">
                                    <div class="mb-4">
                                        <span class="fw-semibold text-muted">Previous Company Name</span>
                                        <p class="fw-bold text-gray-900 mb-0">{{ $employee->previous_company_name ?? '-' }}</p>
                                    </div>
                                    <div class="mb-4">
                                        <span class="fw-semibold text-muted">Previous Job Title</span>
                                        <p class="fw-bold text-gray-900 mb-0">{{ $employee->previous_job_title ?? '-' }}</p>
                                    </div>
                                    <div class="mb-4">
                                        <span class="fw-semibold text-muted">Previous Experience</span>
                                        <p class="fw-bold text-gray-900 mb-0">{{ $employee->previous_experience ?? '-' }}</p>
                                    </div>
                                    <div class="mb-4">
                                        <span class="fw-semibold text-muted">Reason for Leaving</span>
                                        <p class="fw-bold text-gray-900 mb-0">{{ $employee->reason_for_leaving ?? '-' }}</p>
                                    </div>
                                    <div class="mb-4">
                                        <span class="fw-semibold text-muted">Skills</span>
                                        <p class="fw-bold text-gray-900 mb-0">{{ $employee->skills ?? '-' }}</p>
                                    </div>
                                    <div class="mb-4">
                                        <span class="fw-semibold text-muted">Certifications</span>
                                        <p class="fw-bold text-gray-900 mb-0">{{ $employee->certifications ?? '-' }}</p>
                                    </div>
                                    <div class="mb-4">
                                        <span class="fw-semibold text-muted">Languages Known</span>
                                        <p class="fw-bold text-gray-900 mb-0">{{ $employee->languages_known ?? '-' }}</p>
                                    </div>
                                    <div class="mb-4">
                                        <span class="fw-semibold text-muted">Notes</span>
                                        <p class="fw-bold text-gray-900 mb-0">{{ $employee->notes ?? '-' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/update.js') }}"></script>
    <script src="{{ asset('js/common.js') }}"></script>
    <script src="{{ asset('js/delete.js') }}"></script>
@endsection
