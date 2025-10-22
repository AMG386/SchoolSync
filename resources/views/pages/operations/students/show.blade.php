@extends('layouts.app')

@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        
        <!--begin::Layout-->
        <div class="d-flex flex-column flex-lg-row">
            <!--begin::Sidebar-->
            <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
                <!--begin::Card-->
                <div class="card mb-5 mb-xl-8">
                    <!--begin::Card body-->
                    <div class="card-body">
                        <!--begin::Summary-->
                        <div class="d-flex flex-center flex-column py-5">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-100px symbol-circle mb-7">
                                @if($student->photo)
                                    <img src="{{ asset($student->photo) }}" alt="{{ $student->first_name }}" />
                                @else
                                    <div class="symbol-label fs-3 {{ $student->status == 1 ? 'bg-light-success text-success' : 'bg-light-danger text-danger' }}">
                                        {{ substr($student->first_name ?? 'S', 0, 1) }}{{ substr($student->last_name ?? 'T', 0, 1) }}
                                    </div>
                                @endif
                            </div>
                            <!--end::Avatar-->
                            <!--begin::Name-->
                            <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-3">
                                {{ $student->first_name }} {{ $student->last_name }}
                            </a>
                            <!--end::Name-->
                            <!--begin::Position-->
                            <div class="mb-9">
                                <!--begin::Badge-->
                                <div class="badge badge-lg {{ $student->status == 1 ? 'badge-light-success' : 'badge-light-danger' }} d-inline">
                                    {{ config('constants.ad_status.' . $student->status, 'Unknown') }}
                                </div>
                                <!--end::Badge-->
                            </div>
                            <!--end::Position-->
                            <!--begin::Info-->
                            <div class="d-flex flex-wrap flex-center">
                                <!--begin::Stats-->
                                <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                    <div class="d-flex align-items-center">
                                        <i class="ki-duotone ki-profile-circle fs-2 text-primary me-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                        <div class="fs-6 fw-bold text-gray-700">Student ID</div>
                                    </div>
                                    <div class="fw-bold text-gray-900">#{{ $student->id ?? 'N/A' }}</div>
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Summary-->
                        <!--begin::Details toggle-->
                        <div class="d-flex flex-stack fs-4 py-3">
                            <div class="fw-bold rotate collapsible" data-bs-toggle="collapse" href="#kt_user_view_details" role="button" aria-expanded="false" aria-controls="kt_user_view_details">
                                Quick Details
                                <span class="ms-2 rotate-180">
                                    <i class="ki-duotone ki-down fs-3"></i>
                                </span>
                            </div>
                        </div>
                        <!--end::Details toggle-->
                        <div class="separator"></div>
                        <!--begin::Details content-->
                        <div id="kt_user_view_details" class="collapse show">
                            <div class="pb-5 fs-6">
                                <!--begin::Details item-->
                                <div class="fw-bold mt-5">Admission Number</div>
                                <div class="text-gray-600">{{ $student->admission_no ?? 'Not assigned' }}</div>
                                <!--begin::Details item-->
                                <!--begin::Details item-->
                                <div class="fw-bold mt-5">Email</div>
                                <div class="text-gray-600">
                                    <a href="mailto:{{ $student->email }}" class="text-gray-600 text-hover-primary">
                                        {{ $student->email ?? 'Not provided' }}
                                    </a>
                                </div>
                                <!--begin::Details item-->
                                <!--begin::Details item-->
                                <div class="fw-bold mt-5">Phone</div>
                                <div class="text-gray-600">{{ $student->phone ?? 'Not provided' }}</div>
                                <!--begin::Details item-->
                                <!--begin::Details item-->
                                <div class="fw-bold mt-5">Date of Birth</div>
                                <div class="text-gray-600">
                                    {{ $student->dob ? \Carbon\Carbon::parse($student->dob)->format('M d, Y') : 'Not provided' }}
                                </div>
                                <!--begin::Details item-->
                                <!--begin::Details item-->
                                <div class="fw-bold mt-5">Admission Date</div>
                                <div class="text-gray-600">
                                    {{ $student->admission_date ? \Carbon\Carbon::parse($student->admission_date)->format('M d, Y') : 'Not provided' }}
                                </div>
                                <!--begin::Details item-->
                            </div>
                        </div>
                        <!--end::Details content-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
                <!--begin::Connected Accounts-->
                <div class="card mb-5 mb-xl-8">
                    <!--begin::Card header-->
                    <div class="card-header border-0">
                        <div class="card-title">
                            <h3 class="fw-bold m-0">Student Statistics</h3>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-2">
                        <!--begin::Item-->
                        <div class="d-flex flex-stack">
                            <div class="text-gray-700 fw-semibold fs-6 me-2">Enrollment Status</div>
                            <div class="d-flex align-items-senter">
                                <span class="badge {{ $student->status == 1 ? 'badge-light-success' : 'badge-light-danger' }} fs-8 fw-bold">
                                    {{ $student->status == 1 ? 'Active' : 'Inactive' }}
                                </span>
                            </div>
                        </div>
                        <!--end::Item-->
                        <div class="separator separator-dashed my-3"></div>
                        <!--begin::Item-->
                        <div class="d-flex flex-stack">
                            <div class="text-gray-700 fw-semibold fs-6 me-2">Profile Completion</div>
                            <div class="d-flex align-items-center">
                                @php
                                    $completion = 0;
                                    $fields = ['first_name', 'last_name', 'email', 'phone', 'dob', 'address'];
                                    $filledFields = 0;
                                    foreach($fields as $field) {
                                        if(!empty($student->$field)) $filledFields++;
                                    }
                                    $completion = round(($filledFields / count($fields)) * 100);
                                @endphp
                                <div class="progress h-6px w-50px me-2">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ $completion }}%" aria-valuenow="{{ $completion }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="text-gray-700 fw-semibold fs-7">{{ $completion }}%</span>
                            </div>
                        </div>
                        <!--end::Item-->
                        <div class="separator separator-dashed my-3"></div>
                        <!--begin::Item-->
                        <div class="d-flex flex-stack">
                            <div class="text-gray-700 fw-semibold fs-6 me-2">Documents</div>
                            <div class="d-flex align-items-center">
                                @php
                                    $documentsCount = 0;
                                    if($student->photo) $documentsCount++;
                                    if($student->aadhaar_card) $documentsCount++;
                                    if($student->documents) $documentsCount++;
                                @endphp
                                <span class="badge badge-light-primary fs-8 fw-bold">{{ $documentsCount }} Files</span>
                            </div>
                        </div>
                        <!--end::Item-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Connected Accounts-->
            </div>
            <!--end::Sidebar-->

            <!--begin::Content-->
            <div class="flex-lg-row-fluid ms-lg-15">
                <!--begin::Overview-->
                <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                    <!--begin::Card header-->
                    <div class="card-header cursor-pointer">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Student Profile Details</h3>
                        </div>
                        <!--end::Card title-->
                        <!--begin::Action-->
                       
                        <!--end::Action-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body p-9">
                        <!--begin::Row-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-semibold text-muted">Full Name</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <span class="fw-bold fs-6 text-gray-800">{{ $student->first_name }} {{ $student->last_name }}</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-semibold text-muted">Admission Number</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <span class="fw-semibold text-gray-800 fs-6">{{ $student->admission_no ?? 'Not assigned' }}</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-semibold text-muted">Email</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 d-flex align-items-center">
                                <span class="fw-bold fs-6 text-gray-800 me-2">{{ $student->email ?? 'Not provided' }}</span>
                                @if($student->email)
                                    <span class="badge badge-success">Verified</span>
                                @endif
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-semibold text-muted">Phone Number</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 d-flex align-items-center">
                                <span class="fw-bold fs-6 text-gray-800 me-2">{{ $student->phone ?? 'Not provided' }}</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-semibold text-muted">Gender</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <span class="fw-bold fs-6 text-gray-800">{{ ucfirst($student->gender ?? 'Not specified') }}</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-semibold text-muted">Date of Birth</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <span class="fw-bold fs-6 text-gray-800">
                                    {{ $student->dob ? \Carbon\Carbon::parse($student->dob)->format('F d, Y') : 'Not provided' }}
                                </span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-semibold text-muted">Admission Date</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <span class="fw-bold fs-6 text-gray-800">
                                    {{ $student->admission_date ? \Carbon\Carbon::parse($student->admission_date)->format('F d, Y') : 'Not provided' }}
                                </span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-semibold text-muted">Aadhaar Number</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <span class="fw-bold fs-6 text-gray-800">
                                    {{ $student->aadhaar_number ? 'XXXX-XXXX-' . substr($student->aadhaar_number, -4) : 'Not provided' }}
                                </span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-10">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-semibold text-muted">Complete Address</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <span class="fw-bold fs-6 text-gray-800">
                                    @if($student->address || $student->city || $student->state || $student->country)
                                        {{ collect([$student->address, $student->city, $student->state, $student->country])->filter()->implode(', ') }}
                                    @else
                                        Address not provided
                                    @endif
                                </span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Notice-->
                        @if($student->remarks)
                            <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed p-6">
                                <!--begin::Icon-->
                                <i class="ki-duotone ki-information-5 fs-2tx text-primary me-4">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                                <!--end::Icon-->
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-stack flex-grow-1">
                                    <!--begin::Content-->
                                    <div class="fw-semibold">
                                        <h4 class="text-gray-900 fw-bold">Additional Notes</h4>
                                        <div class="fs-6 text-gray-700">{{ $student->remarks }}</div>
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                        @endif
                        <!--end::Notice-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Overview-->
                <!--begin::Documents-->
                <div class="card mb-5 mb-xl-10">
                    <!--begin::Card header-->
                    <div class="card-header border-0 cursor-pointer">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Documents & Files</h3>
                        </div>
                        <!--end::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <span class="badge badge-light-info">{{ $documentsCount ?? 0 }} Files</span>
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body p-9">
                        <!--begin::Files grid-->
                        <div class="row g-6 g-xl-9">
                            <!--begin::Col-->
                            @if($student->photo)
                                <div class="col-md-6 col-lg-4 col-xl-3">
                                    <!--begin::File-->
                                    <div class="card h-100 border border-dashed border-gray-300">
                                        <div class="card-body d-flex flex-center flex-column p-6">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-60px mb-4">
                                                <img src="{{ asset($student->photo) }}" alt="Student Photo" class="rounded" />
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Info-->
                                            <div class="text-center">
                                                <span class="fs-6 fw-bold text-gray-900 d-block">Student Photo</span>
                                                <span class="fs-7 fw-semibold text-muted">Profile Image</span>
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Actions-->
                                            <div class="mt-4">
                                                <a href="{{ asset($student->photo) }}" target="_blank" class="btn btn-sm btn-light-primary">
                                                    <i class="ki-duotone ki-eye fs-4 me-1">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                    </i>View
                                                </a>
                                            </div>
                                            <!--end::Actions-->
                                        </div>
                                    </div>
                                    <!--end::File-->
                                </div>
                            @endif
                            <!--end::Col-->
                            <!--begin::Col-->
                            @if($student->aadhaar_card)
                                <div class="col-md-6 col-lg-4 col-xl-3">
                                    <!--begin::File-->
                                    <div class="card h-100 border border-dashed border-gray-300">
                                        <div class="card-body d-flex flex-center flex-column p-6">
                                            <!--begin::Icon-->
                                            <div class="symbol symbol-60px mb-4">
                                                <div class="symbol-label bg-light-danger">
                                                    <i class="ki-duotone ki-file-text fs-2x text-danger">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </div>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Info-->
                                            <div class="text-center">
                                                <span class="fs-6 fw-bold text-gray-900 d-block">Aadhaar Card</span>
                                                <span class="fs-7 fw-semibold text-muted">Identity Document</span>
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Actions-->
                                            <div class="mt-4">
                                                <a href="{{ asset($student->aadhaar_card) }}" target="_blank" class="btn btn-sm btn-light-primary me-1">
                                                    <i class="ki-duotone ki-eye fs-4 me-1">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                    </i>View
                                                </a>
                                                <a href="{{ asset($student->aadhaar_card) }}" download class="btn btn-sm btn-light-success">
                                                    <i class="ki-duotone ki-down fs-4">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </a>
                                            </div>
                                            <!--end::Actions-->
                                        </div>
                                    </div>
                                    <!--end::File-->
                                </div>
                            @endif
                            <!--end::Col-->
                            <!--begin::Col-->
                            @if($student->documents)
                                <div class="col-md-6 col-lg-4 col-xl-3">
                                    <!--begin::File-->
                                    <div class="card h-100 border border-dashed border-gray-300">
                                        <div class="card-body d-flex flex-center flex-column p-6">
                                            <!--begin::Icon-->
                                            <div class="symbol symbol-60px mb-4">
                                                <div class="symbol-label bg-light-warning">
                                                    <i class="ki-duotone ki-folder fs-2x text-warning">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </div>
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Info-->
                                            <div class="text-center">
                                                <span class="fs-6 fw-bold text-gray-900 d-block">Other Documents</span>
                                                <span class="fs-7 fw-semibold text-muted">Additional Files</span>
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Actions-->
                                            <div class="mt-4">
                                                <a href="{{ asset($student->documents) }}" target="_blank" class="btn btn-sm btn-light-primary me-1">
                                                    <i class="ki-duotone ki-eye fs-4 me-1">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                    </i>View
                                                </a>
                                                <a href="{{ asset($student->documents) }}" download class="btn btn-sm btn-light-success">
                                                    <i class="ki-duotone ki-down fs-4">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </a>
                                            </div>
                                            <!--end::Actions-->
                                        </div>
                                    </div>
                                    <!--end::File-->
                                </div>
                            @endif
                            <!--end::Col-->
                            <!--begin::Col - Add new document placeholder-->
                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <!--begin::File-->
                                <div class="card h-100 border border-dashed border-gray-300 border-hover">
                                    <div class="card-body d-flex flex-center flex-column p-6">
                                        <!--begin::Icon-->
                                        <div class="symbol symbol-60px mb-4">
                                            <div class="symbol-label bg-light-primary">
                                                <i class="ki-duotone ki-plus fs-2x text-primary">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                        </div>
                                        <!--end::Icon-->
                                        <!--begin::Info-->
                                        <div class="text-center">
                                            <span class="fs-6 fw-bold text-gray-700 d-block">Add Document</span>
                                            <span class="fs-7 fw-semibold text-muted">Upload new file</span>
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Actions-->
                                        <div class="mt-4">
                                            <a href="#" class="btn btn-sm btn-light-primary btnAction" data-url="students/{{ $student->id }}/edit" data-redirect="students">
                                                <i class="ki-duotone ki-plus fs-4 me-1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>Upload
                                            </a>
                                        </div>
                                        <!--end::Actions-->
                                    </div>
                                </div>
                                <!--end::File-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Files grid-->
                        @if(!$student->photo && !$student->aadhaar_card && !$student->documents)
                            <!--begin::Empty state-->
                            <div class="text-center py-10">
                                <img src="{{ asset('assets/media/illustrations/sketchy-1/folder.png') }}" alt="" class="mw-200px">
                                <div class="fs-1 fw-bolder text-dark mb-4 mt-5">No documents uploaded yet</div>
                                <div class="fs-6 text-muted mb-6">Start by uploading student documents like photo, Aadhaar card, etc.</div>
                                <a href="#" class="btn btn-primary btnAction" data-url="students/{{ $student->id }}/edit" data-redirect="students">
                                    <i class="ki-duotone ki-plus fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>Upload Documents
                                </a>
                            </div>
                            <!--end::Empty state-->
                        @endif
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Documents-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Layout-->
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

// Initialize page functionality
document.addEventListener('DOMContentLoaded', function() {
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Initialize collapsible elements
    var collapseElementList = [].slice.call(document.querySelectorAll('.collapsible'));
    var collapseList = collapseElementList.map(function (collapseEl) {
        return new bootstrap.Collapse(collapseEl, {
            toggle: false
        });
    });

    // Handle edit button functionality
    document.querySelectorAll('.btnAction').forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            var url = this.getAttribute('data-url');
            var redirect = this.getAttribute('data-redirect');
            
            // You can implement modal opening or redirect logic here
            if (url) {
                // For now, just redirect to edit page
                window.location.href = url;
            }
        });
    });

    // Add hover effects for document cards
    document.querySelectorAll('.border-hover').forEach(function(card) {
        card.addEventListener('mouseenter', function() {
            this.classList.add('border-primary');
        });
        
        card.addEventListener('mouseleave', function() {
            this.classList.remove('border-primary');
        });
    });
});
</script>
<!--end::Custom Javascript-->
@endsection
