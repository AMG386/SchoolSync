@extends('layouts.app')

@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">

        <!--begin::Navbar-->
        <div class="card mb-5 mb-xl-10">
            <div class="card-body pt-9 pb-0">

                <!--begin::Details-->
                <div class="d-flex flex-wrap flex-sm-nowrap mb-3">

                    <!--begin::Avatar-->
                    <div class="me-7 mb-4">
                        <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                            @if($employee->photo)
                                <img src="{{ asset('storage/' . $employee->photo) }}" alt="image" />
                            @else
                                <img src="{{ asset('assets/media/avatars/300-1.jpg') }}" alt="image" />
                            @endif
                            <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border-4 border-body h-20px w-20px"></div>
                        </div>
                    </div>
                    <!--end::Avatar-->

                    <!--begin::Info-->
                    <div class="flex-grow-1">

                        <!--begin::Title-->
                        <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">

                            <!--begin::User-->
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-2">
                                    <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">
                                        {{ $employee->first_name ?? '-' }} {{ $employee->last_name ?? '' }}
                                    </a>
                                    <a href="#">
                                        <i class="ki-outline ki-verify fs-1 text-primary"></i>
                                    </a>
                                </div>

                                <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                    <a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                                        <i class="ki-outline ki-profile-circle fs-4 me-1"></i>
                                        {{ $employee->designation ?? '-' }}
                                    </a>
                                    <a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                                        <i class="ki-outline ki-geolocation fs-4 me-1"></i>
                                        {{ $employee->department ?? '-' }}
                                    </a>
                                    <a href="mailto:{{ $employee->email }}" class="d-flex align-items-center text-gray-500 text-hover-primary mb-2">
                                        <i class="ki-outline ki-sms fs-4 me-1"></i>
                                        {{ $employee->email ?? 'N/A' }}
                                    </a>
                                </div>
                            </div>
                            <!--end::User-->

                            <!--begin::Actions-->
                            
                            <!--end::Actions-->

                        </div>
                        <!--end::Title-->

                        <!--begin::Stats-->
                        <div class="d-flex flex-wrap flex-stack">

                            <div class="d-flex flex-column flex-grow-1 pe-8">
                                <div class="d-flex flex-wrap">

                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <div class="d-flex align-items-center">
                                            <i class="ki-outline ki-arrow-up fs-3 text-success me-2"></i>
                                            <div class="fs-2 fw-bold">#{{ $employee->employee_id ?? '001' }}</div>
                                        </div>
                                        <div class="fw-semibold fs-6 text-gray-500">Employee ID</div>
                                    </div>

                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <div class="d-flex align-items-center">
                                            <i class="ki-outline ki-call fs-3 text-success me-2"></i>
                                            <div class="fs-2 fw-bold">{{ $employee->mobile_number ?? 'N/A' }}</div>
                                        </div>
                                        <div class="fw-semibold fs-6 text-gray-500">Contact Number</div>
                                    </div>

                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <div class="d-flex align-items-center">
                                            <i class="ki-outline ki-calendar fs-3 text-success me-2"></i>
                                            <div class="fs-2 fw-bold">{{ $employee->joining_date ? \Carbon\Carbon::parse($employee->joining_date)->format('M Y') : 'N/A' }}</div>
                                        </div>
                                        <div class="fw-semibold fs-6 text-gray-500">Joined</div>
                                    </div>

                                </div>
                            </div>

                            

                        </div>
                        <!--end::Stats-->

                    </div>
                    <!--end::Info-->

                </div>
                <!--end::Details-->

                <!--begin::Navs-->
                <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold" role="tablist">
                    <li class="nav-item mt-2" role="presentation">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5 active" data-bs-toggle="tab" href="#overview1" role="tab">Overview</a>
                    </li>
                    <li class="nav-item mt-2" role="presentation">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5" data-bs-toggle="tab" href="#personal1" role="tab">Personal</a>
                    </li>
                    <li class="nav-item mt-2" role="presentation">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5" data-bs-toggle="tab" href="#job1" role="tab">Job Details</a>
                    </li>
                    <li class="nav-item mt-2" role="presentation">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5" data-bs-toggle="tab" href="#salary1" role="tab">Salary & Bank</a>
                    </li>
                    <li class="nav-item mt-2" role="presentation">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5" data-bs-toggle="tab" href="#documents1" role="tab">Documents</a>
                    </li>
                </ul>
                <!--end::Navs-->

            </div>
        </div>
        <!--end::Navbar-->

        <!--begin::Tab Content-->
        <div class="tab-content" id="myTabContent">

            <!-- Overview -->
            <div class="tab-pane fade show active" id="overview1" role="tabpanel">
                <div class="row g-6 g-xl-9 mb-6 mb-xl-9">

    <div class="col-md-6 col-xl-4">
        <div class="card border-0 h-100 mb-5">
            <div class="card-body d-flex flex-center p-4">
                <div class="d-flex flex-column align-items-center justify-content-center w-100">
                    <div class="mb-2">
                        <i class="ki-outline ki-abstract-20 fs-2x text-primary"></i>
                    </div>
                    <span class="text-gray-800 fs-3 fw-bold">{{ $employee->department ?? 'N/A' }}</span>
                    <span class="text-gray-500 fs-6 fw-semibold">Department</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-4">
        <div class="card border-0 h-100 mb-5">
            <div class="card-body d-flex flex-center p-4">
                <div class="d-flex flex-column align-items-center justify-content-center w-100">
                    <div class="mb-2">
                        <i class="ki-outline ki-abstract-39 fs-2x text-warning"></i>
                    </div>
                    <span class="text-gray-800 fs-3 fw-bold">{{ $employee->employee_status ?? 'Active' }}</span>
                    <span class="text-gray-500 fs-6 fw-semibold">Status</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-4">
        <div class="card border-0 h-100 mb-5">
            <div class="card-body d-flex flex-center p-4">
                <div class="d-flex flex-column align-items-center justify-content-center w-100">
                    <div class="mb-2">
                        <i class="ki-outline ki-abstract-26 fs-2x text-success"></i>
                    </div>
                    <span class="text-gray-800 fs-3 fw-bold">{{ $employee->employee_type ?? 'Full Time' }}</span>
                    <span class="text-gray-500 fs-6 fw-semibold">Employment Type</span>
                </div>
            </div>
        </div>
    </div>

</div>

            </div>
            <!-- End Overview -->

            <!-- Personal Tab -->
            <div class="tab-pane fade" id="personal1" role="tabpanel">
                <div class="card pt-4 mb-6 mb-xl-9">
                    <div class="card-header border-0">
                        <div class="card-title">
                            <h2>Personal Information</h2>
                        </div>
                    </div>
                    <div class="card-body pt-0 pb-5">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed gy-5">
                                <tbody class="fs-6 fw-semibold text-gray-600">
                                    <tr>
                                        <td class="text-muted min-w-125px w-125px">Gender</td>
                                        <td>{{ $employee->gender ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Date of Birth</td>
                                        <td>{{ $employee->date_of_birth ? \Carbon\Carbon::parse($employee->date_of_birth)->format('M d, Y') : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Age</td>
                                        <td>{{ $employee->age ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Marital Status</td>
                                        <td>{{ $employee->marital_status ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Phone Number</td>
                                        <td>{{ $employee->mobile_number ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Alternate Contact</td>
                                        <td>{{ $employee->alternate_contact_number ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Emergency Contact</td>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <span>{{ $employee->emergency_contact_person ?? '-' }}</span>
                                                <span class="text-muted fs-7">{{ $employee->emergency_contact_number ?? '' }}</span>
                                                <span class="text-muted fs-7">{{ $employee->emergency_contact_relationship ?? '' }}</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Address</td>
                                        <td>
                                            {{ $employee->address_street ?? '' }}
                                            {{ $employee->address_city ? ', '.$employee->address_city : '' }}
                                            {{ $employee->address_state ? ', '.$employee->address_state : '' }}
                                            {{ $employee->address_pincode ? ', '.$employee->address_pincode : '' }}
                                            {{ $employee->address_country ? ', '.$employee->address_country : '' }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Personal -->

            <!-- Job Details Tab -->
            <div class="tab-pane fade" id="job1" role="tabpanel">
                <div class="card pt-4 mb-6 mb-xl-9">
                    <div class="card-header border-0">
                        <div class="card-title">
                            <h2>Job Details</h2>
                        </div>
                    </div>
                    <div class="card-body pt-0 pb-5">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed gy-5">
                                <tbody class="fs-6 fw-semibold text-gray-600">
                                    <tr>
                                        <td class="text-muted">Department</td>
                                        <td>{{ $employee->department ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Designation</td>
                                        <td>{{ $employee->designation ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                <td class="text-muted">Assigned Subjects</td>
                                <td>
                                    @if($subjects->count())
                                        @foreach($subjects as $subject)
                                            <span class="badge badge-light-info me-2">{{ $subject->subject_name }}</span>
                                        @endforeach
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>

                                    <tr>
                                        <td class="text-muted">Employee Type</td>
                                        <td>{{ $employee->employee_type ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Joining Date</td>
                                        <td>{{ $employee->joining_date ? \Carbon\Carbon::parse($employee->joining_date)->format('M d, Y') : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Probation End Date</td>
                                        <td>{{ $employee->probation_end_date ? \Carbon\Carbon::parse($employee->probation_end_date)->format('M d, Y') : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Confirmation Date</td>
                                        <td>{{ $employee->confirmation_date ? \Carbon\Carbon::parse($employee->confirmation_date)->format('M d, Y') : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Resignation/Termination Date</td>
                                        <td>{{ $employee->resignation_termination_date ? \Carbon\Carbon::parse($employee->resignation_termination_date)->format('M d, Y') : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Reporting Manager</td>
                                        <td>{{ $employee->reporting_manager ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Employee Status</td>
                                        <td>{{ $employee->employee_status ?? '-' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Job Details -->

            <!-- Salary & Bank Tab -->
            <div class="tab-pane fade" id="salary1" role="tabpanel">
                <div class="card pt-4 mb-6 mb-xl-9">
                    <div class="card-header border-0">
                        <div class="card-title">
                            <h2>Salary & Bank Details</h2>
                        </div>
                    </div>
                    <div class="card-body pt-0 pb-5">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed gy-5">
                                <tbody class="fs-6 fw-semibold text-gray-600">
                                    <tr>
                                        <td class="text-muted">Basic Salary</td>
                                        <td>{{ $employee->basic_salary ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Allowances</td>
                                        <td>{{ $employee->allowances ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Deductions</td>
                                        <td>{{ $employee->deductions ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Net Salary</td>
                                        <td>{{ $employee->net_salary ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Bank Name</td>
                                        <td>{{ $employee->bank_name ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Account Number</td>
                                        <td>{{ $employee->bank_account_number ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">IFSC/Swift Code</td>
                                        <td>{{ $employee->ifsc_swift_code ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Payroll Cycle</td>
                                        <td>{{ $employee->payroll_cycle ?? '-' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Salary & Bank -->

            <!-- Documents Tab -->
            <div class="tab-pane fade" id="documents1" role="tabpanel">
                <div class="card pt-4 mb-6 mb-xl-9">
                    <div class="card-header border-0">
                        <div class="card-title">
                            <h2>Documents & Additional Info</h2>
                        </div>
                    </div>
                    <div class="card-body pt-0 pb-5">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed gy-5">
                                <tbody class="fs-6 fw-semibold text-gray-600">
                                    <tr>
                                        <td class="text-muted">Aadhaar / National ID</td>
                                        <td>{{ $employee->aadhaar_national_id ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">PAN Number</td>
                                        <td>{{ $employee->pan_number ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Passport Number</td>
                                        <td>{{ $employee->passport_number ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Driving License</td>
                                        <td>{{ $employee->driving_license_number ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Voter ID</td>
                                        <td>{{ $employee->voter_id ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Uploaded Documents</td>
                                        <td>
                                            @if($employee->uploaded_documents)
                                                <a href="{{ asset('storage/' . $employee->uploaded_documents) }}" target="_blank">View Document</a>
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Skills</td>
                                        <td>{{ $employee->skills ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Certifications</td>
                                        <td>{{ $employee->certifications ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Languages Known</td>
                                        <td>{{ $employee->languages_known ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Notes</td>
                                        <td>{{ $employee->notes ?? '-' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Documents -->

        </div>
        <!--end::Tab Content-->

    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('js/update.js') }}"></script>
<script src="{{ asset('js/common.js') }}"></script>
<script src="{{ asset('js/employee.js') }}"></script>
@endsection
