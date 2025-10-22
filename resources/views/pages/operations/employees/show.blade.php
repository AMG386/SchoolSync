@extends('layouts.app')

@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            
            <!--begin::Navbar-->
            <div class="card mb-5 mb-xl-10">
                <div class="card-body pt-9 pb-0">
                    <!--begin::Details-->
                    <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                        <!--begin::Info-->
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
                        <!--end::Info-->
                        <!--begin::Info-->
                        <div class="flex-grow-1">
                            <!--begin::Title-->
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                <!--begin::User-->
                                <div class="d-flex flex-column">
                                    <!--begin::Name-->
                                    <div class="d-flex align-items-center mb-2">
                                        <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">
                                            {{ $employee->first_name ?? '-' }} {{ $employee->last_name ?? '' }}
                                        </a>
                                        <a href="#">
                                            <i class="ki-outline ki-verify fs-1 text-primary"></i>
                                        </a>
                                    </div>
                                    <!--end::Name-->
                                    <!--begin::Info-->
                                    <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                        <a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                                            <i class="ki-outline ki-profile-circle fs-4 me-1"></i>
                                            {{ $employee->designation ?? 'Designation' }}
                                        </a>
                                        <a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                                            <i class="ki-outline ki-geolocation fs-4 me-1"></i>
                                            {{ $employee->department ?? 'Department' }}
                                        </a>
                                        <a href="mailto:{{ $employee->email }}" class="d-flex align-items-center text-gray-500 text-hover-primary mb-2">
                                            <i class="ki-outline ki-sms fs-4 me-1"></i>
                                            {{ $employee->email ?? 'N/A' }}
                                        </a>
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::User-->
                                <!--begin::Actions-->
                                <div class="d-flex my-4">
                                    <a href="#" class="btn btn-sm btn-light me-2 btnAction" 
                                       data-url="employees/{{ $employee->id }}/edit"
                                       data-redirect="employees">
                                        <i class="ki-outline ki-pencil fs-3"></i>
                                        Edit
                                    </a>
                                    <div class="me-0">
                                        <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            <i class="ki-solid ki-dots-horizontal fs-2x"></i>
                                        </button>
                                        <!--begin::Menu 3-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true">
                                            <!--begin::Heading-->
                                            <div class="menu-item px-3">
                                                <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Payments</div>
                                            </div>
                                            <!--end::Heading-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">Create Invoice</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link flex-stack px-3">
                                                    Create Payment
                                                    <span class="ms-2" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference">
                                                        <i class="ki-outline ki-information fs-6"></i>
                                                    </span>
                                                </a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">Generate Bill</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end">
                                                <a href="#" class="menu-link px-3">
                                                    <span class="menu-title">Subscription</span>
                                                    <span class="menu-arrow"></span>
                                                </a>
                                                <!--begin::Menu sub-->
                                                <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">Plans</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">Billing</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">Statements</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu separator-->
                                                    <div class="separator my-2"></div>
                                                    <!--end::Menu separator-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <div class="menu-content px-3">
                                                            <label class="form-check form-switch form-check-custom form-check-solid">
                                                                <input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
                                                                <span class="form-check-label text-muted fs-6">Recuring</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu sub-->
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3 my-1">
                                                <a href="#" class="menu-link px-3">Settings</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu 3-->
                                    </div>
                                </div>
                                <!--end::Actions-->
                            </div>
                            <!--end::Title-->
                            <!--begin::Stats-->
                            <div class="d-flex flex-wrap flex-stack">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column flex-grow-1 pe-8">
                                    <!--begin::Stats-->
                                    <div class="d-flex flex-wrap">
                                        <!--begin::Stat-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <i class="ki-outline ki-arrow-up fs-3 text-success me-2"></i>
                                                <div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="{{ $employee->employee_id ?? '001' }}">#{{ $employee->employee_id ?? '001' }}</div>
                                            </div>
                                            <!--end::Number-->
                                            <!--begin::Label-->
                                            <div class="fw-semibold fs-6 text-gray-500">Employee ID</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->
                                        <!--begin::Stat-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <i class="ki-outline ki-call fs-3 text-success me-2"></i>
                                                <div class="fs-2 fw-bold counted">{{ $employee->mobile_number ?? 'N/A' }}</div>
                                            </div>
                                            <!--end::Number-->
                                            <!--begin::Label-->
                                            <div class="fw-semibold fs-6 text-gray-500">Contact Number</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->
                                        <!--begin::Stat-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <i class="ki-outline ki-calendar fs-3 text-success me-2"></i>
                                                <div class="fs-2 fw-bold counted">{{ $employee->joining_date ? \Carbon\Carbon::parse($employee->joining_date)->format('M Y') : 'N/A' }}</div>
                                            </div>
                                            <!--end::Number-->
                                            <!--begin::Label-->
                                            <div class="fw-semibold fs-6 text-gray-500">Joined</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Progress-->
                                <div class="d-flex align-items-center w-200px w-sm-300px flex-column mt-3">
                                    <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                        <span class="fw-semibold fs-6 text-gray-500">Profile Completion</span>
                                        <span class="fw-bold fs-6">85%</span>
                                    </div>
                                    <div class="h-5px mx-3 w-100 bg-light mb-3">
                                        <div class="bg-success rounded h-5px" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <!--end::Progress-->
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Details-->
                    <!--begin::Navs-->
                    <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold" role="tablist">
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2" role="presentation">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5 active" data-bs-toggle="tab" href="#kt_tab_pane_1" aria-selected="true" role="tab">Overview</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2" role="presentation">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5" data-bs-toggle="tab" href="#kt_tab_pane_2" aria-selected="false" role="tab" tabindex="-1">Personal</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2" role="presentation">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5" data-bs-toggle="tab" href="#kt_tab_pane_3" aria-selected="false" role="tab" tabindex="-1">Job Details</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2" role="presentation">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5" data-bs-toggle="tab" href="#kt_tab_pane_4" aria-selected="false" role="tab" tabindex="-1">Salary & Bank</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2" role="presentation">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5" data-bs-toggle="tab" href="#kt_tab_pane_5" aria-selected="false" role="tab" tabindex="-1">Documents</a>
                        </li>
                        <!--end::Nav item-->
                    </ul>
                    <!--end::Navs-->
                </div>
            </div>
            <!--end::Navbar-->
                            <!--begin::Tab Content-->
            <div class="tab-content" id="myTabContent">
                <!--begin::Tab Pane-->
                <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
                    <!--begin::Row-->
                    <div class="row g-6 g-xl-9 mb-6 mb-xl-9">
                        <!--begin::Col-->
                        <div class="col-md-6 col-xl-4">
                            <!--begin::Card-->
                            <div class="card border-0 h-md-50 mb-5 mb-md-0">
                                <!--begin::Card body-->
                                <div class="card-body d-flex flex-center">
                                    <!--begin::Card widget 13-->
                                    <div class="card-widget-13 d-flex flex-column align-items-center justify-content-center w-100">
                                        <!--begin::Icon-->
                                        <div class="m-0">
                                            <i class="ki-outline ki-abstract-20 fs-4tx text-primary"></i>
                                        </div>
                                        <!--end::Icon-->
                                        <!--begin::Title-->
                                        <span class="text-gray-800 fs-1 fw-bold py-3">{{ $employee->department ?? 'N/A' }}</span>
                                        <!--end::Title-->
                                        <!--begin::Description-->
                                        <span class="text-gray-500 fs-6 fw-semibold">Department</span>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Card widget 13-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-6 col-xl-4">
                            <!--begin::Card-->
                            <div class="card border-0 h-md-50 mb-5 mb-md-0">
                                <!--begin::Card body-->
                                <div class="card-body d-flex flex-center">
                                    <!--begin::Card widget 13-->
                                    <div class="card-widget-13 d-flex flex-column align-items-center justify-content-center w-100">
                                        <!--begin::Icon-->
                                        <div class="m-0">
                                            <i class="ki-outline ki-abstract-39 fs-4tx text-warning"></i>
                                        </div>
                                        <!--end::Icon-->
                                        <!--begin::Title-->
                                        <span class="text-gray-800 fs-1 fw-bold py-3">{{ $employee->employee_status ?? 'Active' }}</span>
                                        <!--end::Title-->
                                        <!--begin::Description-->
                                        <span class="text-gray-500 fs-6 fw-semibold">Status</span>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Card widget 13-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-6 col-xl-4">
                            <!--begin::Card-->
                            <div class="card border-0 h-md-50 mb-5 mb-md-0">
                                <!--begin::Card body-->
                                <div class="card-body d-flex flex-center">
                                    <!--begin::Card widget 13-->
                                    <div class="card-widget-13 d-flex flex-column align-items-center justify-content-center w-100">
                                        <!--begin::Icon-->
                                        <div class="m-0">
                                            <i class="ki-outline ki-abstract-26 fs-4tx text-success"></i>
                                        </div>
                                        <!--end::Icon-->
                                        <!--begin::Title-->
                                        <span class="text-gray-800 fs-1 fw-bold py-3">{{ $employee->employee_type ?? 'Full Time' }}</span>
                                        <!--end::Title-->
                                        <!--begin::Description-->
                                        <span class="text-gray-500 fs-6 fw-semibold">Employment Type</span>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Card widget 13-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Tab Pane-->
                <!--begin::Tab Pane - Personal-->
                <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
                    <!--begin::Card-->
                    <div class="card pt-4 mb-6 mb-xl-9">
                        <!--begin::Card header-->
                        <div class="card-header border-0">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Personal Information</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0 pb-5">
                            <!--begin::Table wrapper-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed gy-5">
                                    <tbody class="fs-6 fw-semibold text-gray-600">
                                        <tr>
                                            <td class="text-muted min-w-125px w-125px">Gender</td>
                                            <td>{{ config('constants.gender')[$employee->gender] ?? '-' }}</td>
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
                                            <td>{{ config('constants.martial_status')[$employee->marital_status] ?? '-' }}</td>
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
                                                @if($employee->address_street), @endif
                                                {{ $employee->address_city ?? '' }}
                                                @if($employee->address_city), @endif
                                                {{ $employee->address_state ?? '' }}
                                                @if($employee->address_state), @endif
                                                {{ $employee->address_pincode ?? '' }}
                                                @if($employee->address_pincode), @endif
                                                {{ $employee->address_country ?? '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Work Email</td>
                                            <td>{{ $employee->work_email ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Work Phone Extension</td>
                                            <td>{{ $employee->work_phone_extension ?? '-' }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Table wrapper-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Tab Pane-->
                <!--begin::Tab Pane - Job Details-->
                <div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel">
                    <!--begin::Card-->
                    <div class="card pt-4 mb-6 mb-xl-9">
                        <!--begin::Card header-->
                        <div class="card-header border-0">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Job Information</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0 pb-5">
                            <!--begin::Table wrapper-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed gy-5">
                                    <tbody class="fs-6 fw-semibold text-gray-600">
                                        <tr>
                                            <td class="text-muted min-w-125px w-125px">Department</td>
                                            <td>{{ $employee->department ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Designation</td>
                                            <td>{{ $employee->designation ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Employee Type</td>
                                            <td>
                                                <span class="badge badge-light-primary">{{ $employee->employee_type ?? 'Full Time' }}</span>
                                            </td>
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
                                            <td class="text-muted">Reporting Manager</td>
                                            <td>{{ $employee->reporting_manager ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Employee Status</td>
                                            <td>
                                                <span class="badge badge-light-success">{{ $employee->employee_status ?? 'Active' }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Employee Code</td>
                                            <td>{{ $employee->employee_code ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Shift</td>
                                            <td>{{ $employee->shift ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Office Location</td>
                                            <td>{{ $employee->office_location ?? '-' }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Table wrapper-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Tab Pane-->
                <!--begin::Tab Pane - Salary & Bank-->
                <div class="tab-pane fade" id="kt_tab_pane_4" role="tabpanel">
                    <!--begin::Row-->
                    <div class="row g-6 g-xl-9">
                        <!--begin::Col-->
                        <div class="col-md-6 col-xl-6">
                            <!--begin::Card-->
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h3>Salary Information</h3>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0 pb-5">
                                    <!--begin::Table wrapper-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-dashed gy-5">
                                            <tbody class="fs-6 fw-semibold text-gray-600">
                                                <tr>
                                                    <td class="text-muted min-w-125px w-125px">Basic Salary</td>
                                                    <td class="fw-bold">₹{{ number_format($employee->basic_salary ?? 0, 2) }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted">Allowances</td>
                                                    <td class="fw-bold">₹{{ number_format($employee->allowances ?? 0, 2) }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted">Deductions</td>
                                                    <td class="fw-bold text-danger">₹{{ number_format($employee->deductions ?? 0, 2) }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted">Net Salary</td>
                                                    <td class="fw-bold text-success">₹{{ number_format($employee->net_salary ?? 0, 2) }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted">Payroll Cycle</td>
                                                    <td>{{ $employee->payroll_cycle ?? 'Monthly' }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table wrapper-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-6 col-xl-6">
                            <!--begin::Card-->
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h3>Bank & Documents</h3>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0 pb-5">
                                    <!--begin::Table wrapper-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-dashed gy-5">
                                            <tbody class="fs-6 fw-semibold text-gray-600">
                                                <tr>
                                                    <td class="text-muted min-w-125px w-125px">Bank Name</td>
                                                    <td>{{ $employee->bank_name ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted">Account Number</td>
                                                    <td>{{ $employee->bank_account_number ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted">IFSC/SWIFT Code</td>
                                                    <td>{{ $employee->ifsc_swift_code ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted">PAN Number</td>
                                                    <td>{{ $employee->pan_number ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted">Aadhaar Number</td>
                                                    <td>{{ $employee->aadhaar_national_id ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted">Passport Number</td>
                                                    <td>{{ $employee->passport_number ?? '-' }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table wrapper-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Tab Pane-->
                
                <!--begin::Tab Pane - Documents-->
                <div class="tab-pane fade" id="kt_tab_pane_5" role="tabpanel">
                    <!--begin::Card-->
                    <div class="card pt-4 mb-6 mb-xl-9">
                        <!--begin::Card header-->
                        <div class="card-header border-0">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Documents & Additional Information</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0 pb-5">
                            <!--begin::Documents section-->
                            <div class="mb-8">
                                <h4 class="mb-4">Uploaded Documents</h4>
                                <div class="d-flex flex-wrap gap-3">
                                    @if($employee->uploaded_documents)
                                        <div class="border border-dashed border-gray-300 rounded p-4 w-200px text-center">
                                            <i class="ki-outline ki-file fs-2tx text-primary mb-2"></i>
                                            <div class="fw-bold text-gray-800">{{ $employee->uploaded_documents }}</div>
                                        </div>
                                    @else
                                        <div class="text-muted">No documents uploaded</div>
                                    @endif
                                </div>
                            </div>
                            <!--end::Documents section-->
                            
                            <!--begin::Additional Info section-->
                            <div class="separator my-5"></div>
                            <h4 class="mb-4">Previous Experience</h4>
                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed gy-5">
                                    <tbody class="fs-6 fw-semibold text-gray-600">
                                        <tr>
                                            <td class="text-muted min-w-125px w-125px">Previous Company</td>
                                            <td>{{ $employee->previous_company_name ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Previous Job Title</td>
                                            <td>{{ $employee->previous_job_title ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Experience</td>
                                            <td>{{ $employee->previous_experience ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Reason for Leaving</td>
                                            <td>{{ $employee->reason_for_leaving ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Skills</td>
                                            <td>
                                                @if($employee->skills)
                                                    @foreach(explode(',', $employee->skills) as $skill)
                                                        <span class="badge badge-light-primary me-1 mb-1">{{ trim($skill) }}</span>
                                                    @endforeach
                                                @else
                                                    -
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Certifications</td>
                                            <td>{{ $employee->certifications ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Languages Known</td>
                                            <td>
                                                @if($employee->languages_known)
                                                    @foreach(explode(',', $employee->languages_known) as $language)
                                                        <span class="badge badge-light-info me-1 mb-1">{{ trim($language) }}</span>
                                                    @endforeach
                                                @else
                                                    -
                                                @endif
                                            </td>
                                        </tr>
                                        @if($employee->notes)
                                            <tr>
                                                <td class="text-muted">Notes</td>
                                                <td>{{ $employee->notes }}</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <!--end::Additional Info section-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Tab Pane-->
            </div>
            <!--end::Tab Content-->

        </div>
    </div>
@endsection

@section('scripts')
    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Vendors Javascript-->
    
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('js/update.js') }}"></script>
    <script src="{{ asset('js/common.js') }}"></script>
    <script src="{{ asset('js/delete.js') }}"></script>
    
    <script>
        "use strict";
        
        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>
    <!--end::Custom Javascript-->
@endsection
