@extends('layouts.app')

@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">

        <!--begin::Toolbar-->
        <div class="d-flex flex-wrap flex-stack mb-6">
            <!--begin::Title-->
            <h3 class="fw-bold my-2">
                Edit Student Profile
                <span class="fs-6 text-gray-500 fw-semibold ms-1">Update {{ $student->first_name }} {{ $student->last_name }}'s information</span>
            </h3>
            <!--end::Title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <a href="{{ route('students.index') }}" class="btn btn-sm btn-light">
                    <i class="ki-duotone ki-arrow-left fs-3">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>Back to Students
                </a>
                <a href="{{ route('students.show', $student->id) }}" class="btn btn-sm btn-light-primary">
                    <i class="ki-duotone ki-eye fs-3">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                    </i>View Profile
                </a>
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Toolbar-->

        <!--begin::Row-->
        <div class="row g-6 g-xl-9">
            <!--begin::Col-->
            <div class="col-lg-8">
                <!--begin::Card-->
                <div class="card card-flush mb-6 mb-xl-9">
                    <div class="card-body pt-9 pb-0">

                        <!--begin::Form-->
                        <form id="fmEdit" class="form" action="#" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            <input type="hidden" id="submiturl" value="students/{{ $student->id }}">
                            @if(!empty($redirect))
                                <input type="hidden" id="redirecturl" name="redirecturl" value="{{ $redirect }}">
                            @endif

                            <!--begin::Stepper-->
                            <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid gap-10" id="kt_edit_student_stepper">
                                <!--begin::Aside-->
                                <div class="d-flex justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-300px w-xxl-400px">
                                    <!--begin::Nav-->
                                    <div class="stepper-nav flex-center flex-xl-start flex-row-fluid">
                                        <!--begin::Step 1-->
                                        <div class="stepper-item current" data-kt-stepper-element="nav">
                                            <div class="stepper-wrapper">
                                                <div class="stepper-icon w-40px h-40px">
                                                    <i class="ki-duotone ki-check fs-2 stepper-check"></i>
                                                    <span class="stepper-number">1</span>
                                                </div>
                                                <div class="stepper-label">
                                                    <h3 class="stepper-title">Personal Info</h3>
                                                    <div class="stepper-desc fw-semibold">Basic details</div>
                                                </div>
                                            </div>
                                            <div class="stepper-line h-40px"></div>
                                        </div>
                                        <!--end::Step 1-->
                                        <!--begin::Step 2-->
                                        <div class="stepper-item" data-kt-stepper-element="nav">
                                            <div class="stepper-wrapper">
                                                <div class="stepper-icon w-40px h-40px">
                                                    <i class="ki-duotone ki-check fs-2 stepper-check"></i>
                                                    <span class="stepper-number">2</span>
                                                </div>
                                                <div class="stepper-label">
                                                    <h3 class="stepper-title">Contact Info</h3>
                                                    <div class="stepper-desc fw-semibold">Address & contact</div>
                                                </div>
                                            </div>
                                            <div class="stepper-line h-40px"></div>
                                        </div>
                                        <!--end::Step 2-->
                                        <!--begin::Step 3-->
                                        <div class="stepper-item" data-kt-stepper-element="nav">
                                            <div class="stepper-wrapper">
                                                <div class="stepper-icon w-40px h-40px">
                                                    <i class="ki-duotone ki-check fs-2 stepper-check"></i>
                                                    <span class="stepper-number">3</span>
                                                </div>
                                                <div class="stepper-label">
                                                    <h3 class="stepper-title">Documents</h3>
                                                    <div class="stepper-desc fw-semibold">Upload files</div>
                                                </div>
                                            </div>
                                            <div class="stepper-line h-40px"></div>
                                        </div>
                                        <!--end::Step 3-->
                                        <!--begin::Step 4-->
                                        <div class="stepper-item" data-kt-stepper-element="nav">
                                            <div class="stepper-wrapper">
                                                <div class="stepper-icon w-40px h-40px">
                                                    <i class="ki-duotone ki-check fs-2 stepper-check"></i>
                                                    <span class="stepper-number">4</span>
                                                </div>
                                                <div class="stepper-label">
                                                    <h3 class="stepper-title">Review</h3>
                                                    <div class="stepper-desc fw-semibold">Finalize changes</div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Step 4-->
                                    </div>
                                    <!--end::Nav-->
                                </div>
                                <!--end::Aside-->

                                <!--begin::Content-->
                                <div class="flex-row-fluid">
                                    <!--begin::Form-->
                                    <div class="py-20 w-100 px-9">
                                        
                                        <!--begin::Step 1 - Personal Information-->
                                        <div class="current" data-kt-stepper-element="content">
                                            <!--begin::Wrapper-->
                                            <div class="w-100">
                                                <!--begin::Heading-->
                                                <div class="pb-8 pb-lg-10">
                                                    <!--begin::Title-->
                                                    <h2 class="fw-bold d-flex align-items-center text-gray-900">
                                                        <i class="ki-duotone ki-profile-circle fs-3 text-gray-500 me-3">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>Personal Information
                                                    </h2>
                                                    <!--end::Title-->
                                                    <!--begin::Notice-->
                                                    <div class="text-muted fw-semibold fs-6">
                                                        Update the student's basic personal information below.
                                                    </div>
                                                    <!--end::Notice-->
                                                </div>
                                                <!--end::Heading-->

                                                <!--begin::Input group-->
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="d-flex align-items-center form-label mb-3">
                                                        Admission Number
                                                        <span class="ms-1" data-bs-toggle="tooltip" title="Unique admission number for the student">
                                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                                <span class="path3"></span>
                                                            </i>
                                                        </span>
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control form-control-lg form-control-solid" name="admission_no" placeholder="Enter admission number" value="{{ old('admission_no', $student->admission_no) }}" />
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Row-->
                                                <div class="row mb-10">
                                                    <!--begin::Col-->
                                                    <div class="col-md-6 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="required form-label mb-3">First Name</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" class="form-control form-control-lg form-control-solid" name="first_name" placeholder="Enter first name" value="{{ old('first_name', $student->first_name) }}" required />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-md-6 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="required form-label mb-3">Last Name</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" class="form-control form-control-lg form-control-solid" name="last_name" placeholder="Enter last name" value="{{ old('last_name', $student->last_name) }}" required />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->

                                                <!--begin::Row-->
                                                <div class="row mb-10">
                                                    <!--begin::Col-->
                                                    <div class="col-md-6 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="required form-label mb-3">Gender</label>
                                                        <!--end::Label-->
                                                        <!--begin::Select-->
                                                        <select class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select gender" name="gender" required>
                                                            <option></option>
                                                            <option value="male" {{ old('gender', $student->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                                            <option value="female" {{ old('gender', $student->gender) == 'female' ? 'selected' : '' }}>Female</option>
                                                            <option value="other" {{ old('gender', $student->gender) == 'other' ? 'selected' : '' }}>Other</option>
                                                        </select>
                                                        <!--end::Select-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-md-6 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="form-label mb-3">Date of Birth</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="date" class="form-control form-control-lg form-control-solid" name="dob" value="{{ old('dob', $student->dob) }}" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->

                                                <!--begin::Input group-->
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="form-label mb-3">Status</label>
                                                    <!--end::Label-->
                                                    <!--begin::Select-->
                                                    <select class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select status" name="status">
                                                        <option value="1" {{ old('status', $student->status) == 1 ? 'selected' : '' }}>Active</option>
                                                        <option value="0" {{ old('status', $student->status) == 0 ? 'selected' : '' }}>Inactive</option>
                                                    </select>
                                                    <!--end::Select-->
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Step 1-->

                                        <!--begin::Step 2 - Contact Information-->
                                        <div data-kt-stepper-element="content">
                                            <!--begin::Wrapper-->
                                            <div class="w-100">
                                                <!--begin::Heading-->
                                                <div class="pb-8 pb-lg-10">
                                                    <!--begin::Title-->
                                                    <h2 class="fw-bold d-flex align-items-center text-gray-900">
                                                        <i class="ki-duotone ki-address-book fs-3 text-gray-500 me-3">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>Contact Information
                                                    </h2>
                                                    <!--end::Title-->
                                                    <!--begin::Notice-->
                                                    <div class="text-muted fw-semibold fs-6">
                                                        Update the student's contact details and address information.
                                                    </div>
                                                    <!--end::Notice-->
                                                </div>
                                                <!--end::Heading-->

                                                <!--begin::Row-->
                                                <div class="row mb-10">
                                                    <!--begin::Col-->
                                                    <div class="col-md-6 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="form-label mb-3">Phone Number</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="tel" class="form-control form-control-lg form-control-solid" name="phone" placeholder="Enter phone number" value="{{ old('phone', $student->phone) }}" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-md-6 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="form-label mb-3">Email Address</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="email" class="form-control form-control-lg form-control-solid" name="email" placeholder="Enter email address" value="{{ old('email', $student->email) }}" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->

                                                <!--begin::Input group-->
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="form-label mb-3">Address</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <textarea class="form-control form-control-lg form-control-solid" rows="3" name="address" placeholder="Enter complete address">{{ old('address', $student->address) }}</textarea>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Row-->
                                                <div class="row mb-10">
                                                    <!--begin::Col-->
                                                    <div class="col-md-4 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="form-label mb-3">City</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" class="form-control form-control-lg form-control-solid" name="city" placeholder="Enter city" value="{{ old('city', $student->city) }}" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-md-4 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="form-label mb-3">State</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" class="form-control form-control-lg form-control-solid" name="state" placeholder="Enter state" value="{{ old('state', $student->state) }}" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-md-4 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="form-label mb-3">ZIP Code</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" class="form-control form-control-lg form-control-solid" name="zip" placeholder="Enter ZIP code" value="{{ old('zip', $student->zip) }}" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Step 2-->

                                        <!--begin::Step 3 - Documents-->
                                        <div data-kt-stepper-element="content">
                                            <!--begin::Wrapper-->
                                            <div class="w-100">
                                                <!--begin::Heading-->
                                                <div class="pb-8 pb-lg-10">
                                                    <!--begin::Title-->
                                                    <h2 class="fw-bold d-flex align-items-center text-gray-900">
                                                        <i class="ki-duotone ki-folder fs-3 text-gray-500 me-3">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>Document Management
                                                    </h2>
                                                    <!--end::Title-->
                                                    <!--begin::Notice-->
                                                    <div class="text-muted fw-semibold fs-6">
                                                        Update or replace student documents and files.
                                                    </div>
                                                    <!--end::Notice-->
                                                </div>
                                                <!--end::Heading-->

                                                <!--begin::Current Photo-->
                                                <div class="mb-15">
                                                    <!--begin::Label-->
                                                    <label class="form-label mb-5">Student Photo</label>
                                                    <!--end::Label-->
                                                    
                                                    @if($student->photo)
                                                        <!--begin::Current image-->
                                                        <div class="mb-5">
                                                            <div class="d-flex align-items-center bg-light-info rounded p-5">
                                                                <div class="symbol symbol-80px me-5">
                                                                    <img src="{{ asset($student->photo) }}" alt="Current photo" />
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <div class="fw-bold text-gray-900 fs-6">Current Photo</div>
                                                                    <div class="text-muted fs-7">{{ basename($student->photo) }}</div>
                                                                </div>
                                                                <button type="button" class="btn btn-sm btn-light-danger" onclick="removeCurrentPhoto()">
                                                                    <i class="ki-duotone ki-trash fs-6">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                        <span class="path3"></span>
                                                                        <span class="path4"></span>
                                                                        <span class="path5"></span>
                                                                    </i>Remove
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <!--end::Current image-->
                                                    @endif

                                                    <!--begin::Input group-->
                                                    <div class="fv-row">
                                                        <!--begin::Dropzone-->
                                                        <div class="dropzone" id="kt_dropzone_photo">
                                                            <!--begin::Message-->
                                                            <div class="dz-message needsclick">
                                                                <!--begin::Icon-->
                                                                <i class="ki-duotone ki-file-up fs-3x text-primary">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>
                                                                <!--end::Icon-->
                                                                <!--begin::Info-->
                                                                <div class="ms-4">
                                                                    <h3 class="fs-5 fw-bold text-gray-900 mb-1">Drop student photo here or click to upload.</h3>
                                                                    <span class="fs-7 fw-semibold text-gray-500">Upload only jpg, jpeg, png files. Max size: 2MB</span>
                                                                </div>
                                                                <!--end::Info-->
                                                            </div>
                                                        </div>
                                                        <!--end::Dropzone-->
                                                    </div>
                                                    <!--end::Input group-->
                                                </div>
                                                <!--end::Current Photo-->

                                                <!--begin::Documents Section-->
                                                <div class="mb-10">
                                                    <!--begin::Label-->
                                                    <label class="form-label mb-5">Additional Documents</label>
                                                    <!--end::Label-->
                                                    
                                                    <!--begin::Input group-->
                                                    <div class="fv-row">
                                                        <!--begin::Dropzone-->
                                                        <div class="dropzone" id="kt_dropzone_documents">
                                                            <!--begin::Message-->
                                                            <div class="dz-message needsclick">
                                                                <!--begin::Icon-->
                                                                <i class="ki-duotone ki-file-up fs-3x text-primary">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>
                                                                <!--end::Icon-->
                                                                <!--begin::Info-->
                                                                <div class="ms-4">
                                                                    <h3 class="fs-5 fw-bold text-gray-900 mb-1">Drop additional documents here or click to upload.</h3>
                                                                    <span class="fs-7 fw-semibold text-gray-500">Upload pdf, doc, docx files. Max size: 5MB per file</span>
                                                                </div>
                                                                <!--end::Info-->
                                                            </div>
                                                        </div>
                                                        <!--end::Dropzone-->
                                                    </div>
                                                    <!--end::Input group-->
                                                </div>
                                                <!--end::Documents Section-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Step 3-->

                                        <!--begin::Step 4 - Review-->
                                        <div data-kt-stepper-element="content">
                                            <!--begin::Wrapper-->
                                            <div class="w-100">
                                                <!--begin::Heading-->
                                                <div class="pb-8 pb-lg-10">
                                                    <!--begin::Title-->
                                                    <h2 class="fw-bold d-flex align-items-center text-gray-900">
                                                        <i class="ki-duotone ki-check-circle fs-3 text-gray-500 me-3">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>Review & Update
                                                    </h2>
                                                    <!--end::Title-->
                                                    <!--begin::Notice-->
                                                    <div class="text-muted fw-semibold fs-6">
                                                        Review all changes before updating {{ $student->first_name }}'s profile.
                                                    </div>
                                                    <!--end::Notice-->
                                                </div>
                                                <!--end::Heading-->
                                                
                                                <!--begin::Alert-->
                                                <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-12 p-6">
                                                    <!--begin::Icon-->
                                                    <i class="ki-duotone ki-information-5 fs-2tx text-warning me-4">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                    </i>
                                                    <!--end::Icon-->
                                                    <!--begin::Wrapper-->
                                                    <div class="d-flex flex-stack flex-grow-1">
                                                        <!--begin::Content-->
                                                        <div class="fw-semibold">
                                                            <h4 class="text-gray-900 fw-bold">Review Your Changes</h4>
                                                            <div class="fs-6 text-gray-700">Please review all the information you've entered before submitting the update. Once submitted, the student's profile will be updated with the new information.</div>
                                                        </div>
                                                        <!--end::Content-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                </div>
                                                <!--end::Alert-->

                                                <!--begin::Summary-->
                                                <div class="row g-6 g-xl-9">
                                                    <!--begin::Col-->
                                                    <div class="col-md-6">
                                                        <!--begin::Card-->
                                                        <div class="card bg-light-primary">
                                                            <div class="card-body">
                                                                <h5 class="card-title text-primary">Personal Information</h5>
                                                                <div class="text-gray-700 fs-6">
                                                                    <div class="d-flex justify-content-between mb-2">
                                                                        <span>Name:</span>
                                                                        <span id="review_name">{{ $student->first_name }} {{ $student->last_name }}</span>
                                                                    </div>
                                                                    <div class="d-flex justify-content-between mb-2">
                                                                        <span>Gender:</span>
                                                                        <span id="review_gender">{{ ucfirst($student->gender) }}</span>
                                                                    </div>
                                                                    <div class="d-flex justify-content-between">
                                                                        <span>Status:</span>
                                                                        <span id="review_status">{{ $student->status ? 'Active' : 'Inactive' }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Card-->
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-md-6">
                                                        <!--begin::Card-->
                                                        <div class="card bg-light-info">
                                                            <div class="card-body">
                                                                <h5 class="card-title text-info">Contact Information</h5>
                                                                <div class="text-gray-700 fs-6">
                                                                    <div class="d-flex justify-content-between mb-2">
                                                                        <span>Phone:</span>
                                                                        <span id="review_phone">{{ $student->phone ?? 'Not provided' }}</span>
                                                                    </div>
                                                                    <div class="d-flex justify-content-between mb-2">
                                                                        <span>Email:</span>
                                                                        <span id="review_email">{{ $student->email ?? 'Not provided' }}</span>
                                                                    </div>
                                                                    <div class="d-flex justify-content-between">
                                                                        <span>City:</span>
                                                                        <span id="review_city">{{ $student->city ?? 'Not provided' }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Card-->
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Summary-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Step 4-->

                                        <!--begin::Actions-->
                                        <div class="d-flex flex-stack pt-10 pt-lg-15">
                                            <!--begin::Wrapper-->
                                            <div class="mr-2">
                                                <button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
                                                    <i class="ki-duotone ki-arrow-left fs-4 me-1">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>Previous Step
                                                </button>
                                            </div>
                                            <!--end::Wrapper-->
                                            <!--begin::Wrapper-->
                                            <div>
                                                <button type="button" class="btn btn-lg btn-primary me-3" data-kt-stepper-action="next">
                                                    Next Step
                                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </button>
                                                <button type="submit" class="btn btn-lg btn-success btnSave" data-kt-stepper-action="submit">
                                                    <i class="ki-duotone ki-check fs-3 me-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>Update Student Profile
                                                </button>
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Actions-->

                                    </div>
                                    <!--end::Form-->
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Stepper-->

                        </form>
                        <!--end::Form-->
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Col-->
            
            <!--begin::Col-->
            <div class="col-lg-4">
                <!--begin::Student Preview Card-->
                <div class="card card-flush bg-primary">
                    <div class="card-body text-center py-20">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-100px symbol-circle mx-auto mb-7">
                            @if($student->photo)
                                <img src="{{ asset($student->photo) }}" alt="{{ $student->first_name }}" class="rounded-circle" />
                            @else
                                <div class="symbol-label fs-1 bg-white text-primary">
                                    {{ substr($student->first_name ?? 'S', 0, 1) }}{{ substr($student->last_name ?? 'T', 0, 1) }}
                                </div>
                            @endif
                        </div>
                        <!--end::Avatar-->
                        
                        <!--begin::Name-->
                        <a href="#" class="fs-3 text-white text-hover-primary fw-bold mb-3 d-block">
                            {{ $student->first_name }} {{ $student->last_name }}
                        </a>
                        <!--end::Name-->
                        
                        <!--begin::Position-->
                        <div class="mb-9">
                            <div class="badge badge-lg {{ $student->status == 1 ? 'badge-light-success' : 'badge-light-danger' }} text-white mb-2">
                                <i class="ki-duotone ki-{{ $student->status == 1 ? 'check-circle' : 'cross-circle' }} fs-4 me-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                {{ $student->status == 1 ? 'Active' : 'Inactive' }}
                            </div>
                            <div class="text-white opacity-75 fs-7">
                                Student ID: {{ $student->admission_no ?? 'Not assigned' }}
                            </div>
                        </div>
                        <!--end::Position-->
                        
                        <!--begin::Info-->
                        <div class="d-flex flex-wrap flex-center">
                            <!--begin::Stats-->
                            <div class="border border-white border-dashed rounded py-3 px-3 mx-4 mb-3">
                                <div class="d-flex align-items-center">
                                    <i class="ki-duotone ki-calendar-8 fs-3 text-white me-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                        <span class="path5"></span>
                                        <span class="path6"></span>
                                    </i>
                                    <div class="fs-6 fw-bold text-white">
                                        {{ $student->dob ? \Carbon\Carbon::parse($student->dob)->format('M d, Y') : 'Not set' }}
                                    </div>
                                </div>
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Info-->
                        
                        <!--begin::Contact Info-->
                        <div class="notice d-flex bg-light-info rounded border-info border border-dashed p-6 mt-8">
                            <div class="d-flex flex-stack flex-grow-1">
                                <div class="fw-semibold">
                                    <div class="fs-6 text-gray-700">
                                        <i class="ki-duotone ki-phone fs-4 text-info me-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        {{ $student->phone ?? 'No phone' }}
                                    </div>
                                    <div class="fs-6 text-gray-700 mt-2">
                                        <i class="ki-duotone ki-sms fs-4 text-info me-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        {{ $student->email ?? 'No email' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Contact Info-->
                        
                        <!--begin::Last Updated-->
                        <div class="text-white opacity-50 fs-8 mt-6">
                            <i class="ki-duotone ki-time fs-6 me-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            Last updated: {{ $student->updated_at ? $student->updated_at->diffForHumans() : 'Never' }}
                        </div>
                        <!--end::Last Updated-->
                    </div>
                </div>
                <!--end::Student Preview Card-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->
    </div>
</div>

@push('scripts')
<script src="{{ asset('js/operations/student-edit-stepper.js') }}"></script>
<script>
// Auto-initialize form components
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Select2
    if (typeof $ !== 'undefined' && $.fn.select2) {
        $('[data-control="select2"]').select2({
            minimumResultsForSearch: -1
        });
    }

    // Initialize tooltips
    if (typeof bootstrap !== 'undefined') {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    }

    // Photo removal function
    window.removeCurrentPhoto = function() {
        // Add logic to mark photo for removal
        if (confirm('Are you sure you want to remove the current photo?')) {
            // Hide current photo section and add hidden input to mark for removal
            var photoSection = document.querySelector('.bg-light-info');
            if (photoSection) {
                photoSection.style.display = 'none';
                // Add hidden field to mark photo for removal
                var removeInput = document.createElement('input');
                removeInput.type = 'hidden';
                removeInput.name = 'remove_photo';
                removeInput.value = '1';
                document.getElementById('fmEdit').appendChild(removeInput);
            }
        }
    };
});
</script>
@endpush

@endsection
