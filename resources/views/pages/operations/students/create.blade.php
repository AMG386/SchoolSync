<!--begin::Modal header-->
<div class="modal-header pb-0 border-0 justify-content-end">
    <!--begin::Close-->
    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
        <i class="ki-duotone ki-cross fs-1">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
    </div>
    <!--end::Close-->
</div>
<!--end::Modal header-->

<!--begin::Modal body-->
<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
    <!--begin::Form-->
    <form id="fmCreate" class="form" action="#">
        @csrf
        <input type="hidden" id="submiturl" value="students">
        @if (!empty($redirect))
            <input type="hidden" id="redirecturl" name="redirecturl" value="{{ $redirect }}">
        @endif

        <!--begin::Heading-->
        <div class="mb-13 text-center">
            <!--begin::Title-->
            <h1 class="mb-3">Create Student Account</h1>
            <!--end::Title-->
            <!--begin::Description-->
            <div class="text-muted fw-semibold fs-5">
                Fill in the student information step by step to create a new account.
            </div>
            <!--end::Description-->
        </div>
        <!--end::Heading-->

        <!--begin::Stepper-->
        <div class="stepper stepper-links d-flex flex-column pt-15" id="kt_create_student_stepper">
            <!--begin::Nav-->
            <div class="stepper-nav mb-5">
                <!--begin::Step 1-->
                <div class="stepper-item current" data-kt-stepper-element="nav">
                    <h3 class="stepper-title">Personal Info</h3>
                </div>
                <!--end::Step 1-->
                <!--begin::Step 2-->
                <div class="stepper-item" data-kt-stepper-element="nav">
                    <h3 class="stepper-title">Contact Details</h3>
                </div>
                <!--end::Step 2-->
                <!--begin::Step 3-->
                <div class="stepper-item" data-kt-stepper-element="nav">
                    <h3 class="stepper-title">Documents</h3>
                </div>
                <!--end::Step 3-->
                <!--begin::Step 4-->
                <div class="stepper-item" data-kt-stepper-element="nav">
                    <h3 class="stepper-title">Review & Submit</h3>
                </div>
                <!--end::Step 4-->
            </div>
            <!--end::Nav-->

            <!--begin::Content-->
            <div class="flex-row-fluid py-lg-5 px-lg-15">
                <!--begin::Form-->
                <div class="current" data-kt-stepper-element="content">
                    <!--begin::Wrapper-->
                    <div class="w-100">
                        <!--begin::Heading-->
                        <div class="pb-10 pb-lg-15">
                            <!--begin::Title-->
                            <h2 class="fw-bold text-gray-900">Personal Information</h2>
                            <!--end::Title-->
                            <!--begin::Notice-->
                            <div class="text-muted fw-semibold fs-6">
                                Please provide the student's basic personal information.
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
                            <input type="text" class="form-control form-control-lg form-control-solid" name="admission_no" placeholder="Enter admission number" value="{{ old('admission_no') }}" />
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
                                <input type="text" class="form-control form-control-lg form-control-solid" name="first_name" placeholder="Enter first name" value="{{ old('first_name') }}" />
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label mb-3">Last Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-lg form-control-solid" name="last_name" placeholder="Enter last name" value="{{ old('last_name') }}" />
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
                                <!--begin::Input-->
                                <select class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select gender" data-allow-clear="true" name="gender">
                                    <option></option>
                                    @if(config('constants.gender'))
                                        @foreach(config('constants.gender') as $key => $value)
                                            <option value="{{ $key }}" {{ old('gender') == $key ? 'selected' : '' }}>{{ $value }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label mb-3">Date of Birth</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="date" class="form-control form-control-lg form-control-solid" name="dob" value="{{ old('dob') }}" />
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
                                <label class="form-label mb-3">Admission Date</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="date" class="form-control form-control-lg form-control-solid" name="admission_date" value="{{ old('admission_date') }}" />
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <!--begin::Label-->
                                <label class="form-label mb-3">Aadhaar Number</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-lg form-control-solid" name="aadhaar_number" placeholder="Enter Aadhaar number" value="{{ old('aadhaar_number') }}" />
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
                                <label class="required form-label mb-3">Class</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select class" data-allow-clear="true" name="class_id">
                                    <option></option>
                                    @if(isset($classes))
                                        @foreach($classes as $class)
                                            <option value="{{ $class->id }}" {{ old('class_id') == $class->id ? 'selected' : '' }}>{{ $class->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <!--begin::Label-->
                                <label class="form-label mb-3">Section</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-select form-select-lg form-select-solid" data-control="select2" data-placeholder="Select section" data-allow-clear="true" name="section_id">
                                    <option></option>
                                    @if(isset($sections))
                                        @foreach($sections as $section)
                                            <option value="{{ $section->id }}" {{ old('section_id') == $section->id ? 'selected' : '' }}>{{ $section->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Form-->

                <!--begin::Form-->
                <div data-kt-stepper-element="content">
                    <!--begin::Wrapper-->
                    <div class="w-100">
                        <!--begin::Heading-->
                        <div class="pb-10 pb-lg-15">
                            <!--begin::Title-->
                            <h2 class="fw-bold text-gray-900">Contact Information</h2>
                            <!--end::Title-->
                            <!--begin::Notice-->
                            <div class="text-muted fw-semibold fs-6">
                                Enter the student's contact details and address information.
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
                                <input type="tel" class="form-control form-control-lg form-control-solid" name="phone" placeholder="Enter phone number" value="{{ old('phone') }}" />
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <!--begin::Label-->
                                <label class="form-label mb-3">Email Address</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="email" class="form-control form-control-lg form-control-solid" name="email" placeholder="Enter email address" value="{{ old('email') }}" />
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
                            <textarea class="form-control form-control-lg form-control-solid" rows="3" name="address" placeholder="Enter complete address">{{ old('address') }}</textarea>
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
                                <input type="text" class="form-control form-control-lg form-control-solid" name="city" placeholder="Enter city" value="{{ old('city') }}" />
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-4 fv-row">
                                <!--begin::Label-->
                                <label class="form-label mb-3">State</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-lg form-control-solid" name="state" placeholder="Enter state" value="{{ old('state') }}" />
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-4 fv-row">
                                <!--begin::Label-->
                                <label class="form-label mb-3">Country</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-lg form-control-solid" name="country" placeholder="Enter country" value="{{ old('country') }}" />
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Form-->

                <!--begin::Form-->
                <div data-kt-stepper-element="content">
                    <!--begin::Wrapper-->
                    <div class="w-100">
                        <!--begin::Heading-->
                        <div class="pb-10 pb-lg-15">
                            <!--begin::Title-->
                            <h2 class="fw-bold text-gray-900">Document Upload</h2>
                            <!--end::Title-->
                            <!--begin::Notice-->
                            <div class="text-muted fw-semibold fs-6">
                                Upload important documents and student photo.
                            </div>
                            <!--end::Notice-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Input group-->
                        <div class="mb-15">
                            <!--begin::Label-->
                            <label class="form-label mb-3">Student Photo</label>
                            <!--end::Label-->
                            <!--begin::Dropzone-->
                            <div class="dropzone dropzone-queue mb-2" id="kt_dropzone_photo">
                                <!--begin::Controls-->
                                <div class="dropzone-panel mb-lg-0 mb-2">
                                    <a class="dropzone-select btn btn-sm btn-primary me-2">Attach Photo</a>
                                    <a class="dropzone-remove-all btn btn-sm btn-light-primary">Remove All</a>
                                </div>
                                <!--end::Controls-->
                                <!--begin::Items-->
                                <div class="dropzone-items wm-200px">
                                    <div class="dropzone-item" style="display:none">
                                        <!--begin::File-->
                                        <div class="dropzone-file">
                                            <div class="dropzone-filename" title="some_image_file_name.jpg">
                                                <span data-dz-name="">some_image_file_name.jpg</span>
                                                <strong>(<span data-dz-size="">340kb</span>)</strong>
                                            </div>
                                            <div class="dropzone-error" data-dz-errormessage=""></div>
                                        </div>
                                        <!--end::File-->
                                        <!--begin::Progress-->
                                        <div class="dropzone-progress">
                                            <div class="progress">
                                                <div class="progress-bar bg-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" data-dz-uploadprogress=""></div>
                                            </div>
                                        </div>
                                        <!--end::Progress-->
                                        <!--begin::Toolbar-->
                                        <div class="dropzone-toolbar">
                                            <span class="dropzone-delete" data-dz-remove="">
                                                <i class="bi bi-x fs-1"></i>
                                            </span>
                                        </div>
                                        <!--end::Toolbar-->
                                    </div>
                                </div>
                                <!--end::Items-->
                            </div>
                            <!--end::Dropzone-->
                            <!--begin::Hint-->
                            <div class="form-text">Max file size is 1MB and max number of files is 1.</div>
                            <!--end::Hint-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Row-->
                        <div class="row mb-10">
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <!--begin::Label-->
                                <label class="form-label mb-3">Aadhaar Card</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="file" class="form-control form-control-lg form-control-solid" name="aadhaar_card" accept=".pdf,.jpg,.jpeg,.png" />
                                <!--end::Input-->
                                <!--begin::Hint-->
                                <div class="form-text">Accepted formats: PDF, JPG, PNG</div>
                                <!--end::Hint-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <!--begin::Label-->
                                <label class="form-label mb-3">Other Documents</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="file" class="form-control form-control-lg form-control-solid" name="documents" multiple accept=".pdf,.jpg,.jpeg,.png,.doc,.docx" />
                                <!--end::Input-->
                                <!--begin::Hint-->
                                <div class="form-text">Multiple files allowed</div>
                                <!--end::Hint-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Form-->

                <!--begin::Form-->
                <div data-kt-stepper-element="content">
                    <!--begin::Wrapper-->
                    <div class="w-100">
                        <!--begin::Heading-->
                        <div class="pb-10 pb-lg-12">
                            <!--begin::Title-->
                            <h2 class="fw-bold text-gray-900">Review & Submit</h2>
                            <!--end::Title-->
                            <!--begin::Notice-->
                            <div class="text-muted fw-semibold fs-6">
                                Please review all information before submitting the student registration.
                            </div>
                            <!--end::Notice-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Review-->
                        <div class="mb-0">
                            <!--begin::Alert-->
                            <div class="notice d-flex bg-light-info rounded border-info border border-dashed mb-12 p-6">
                                <!--begin::Icon-->
                                <i class="ki-duotone ki-information-5 fs-2tx text-info me-4">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                                <!--end::Icon-->
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-stack flex-grow-1">
                                    <!--begin::Content-->
                                    <div class="fw-semibold">
                                        <h4 class="text-gray-900 fw-bold">Review Information</h4>
                                        <div class="fs-6 text-gray-700">Please ensure all the information entered is correct before submitting the form. You can go back to previous steps to make any necessary changes.</div>
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Alert-->
                            <!--begin::Summary-->
                            <div class="d-flex flex-column mb-8">
                                <div class="fs-6 text-gray-600 mb-2">By clicking "Submit", you confirm that all the provided information is accurate and complete.</div>
                            </div>
                            <!--end::Summary-->
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="form-label mb-3">Additional Remarks (Optional)</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <textarea class="form-control form-control-lg form-control-solid" rows="4" name="remarks" placeholder="Add any additional remarks or special notes about the student">{{ old('remarks') }}</textarea>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Review-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Form-->
            </div>
            <!--end::Content-->
            
            <!--begin::Actions-->
            <div class="d-flex flex-stack pt-15">
                <!--begin::Wrapper-->
                <div class="mr-2">
                    <button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
                        <i class="ki-duotone ki-arrow-left fs-4 me-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>Back
                    </button>
                </div>
                <!--end::Wrapper-->
                <!--begin::Wrapper-->
                <div>
                    <button type="button" class="btn btn-lg btn-primary me-3" data-kt-stepper-action="next">
                        Continue
                        <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </button>
                    <button type="submit" class="btn btn-lg btn-primary btnSave" data-kt-stepper-action="submit">
                        <i class="ki-duotone ki-check fs-3 ms-1 me-0">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>Submit
                    </button>
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Stepper-->
    </form>
    <!--end::Form-->
</div>
<!--end::Modal body-->

<!--begin::Modal scripts-->
<script>
    // Include the stepper functionality
    document.addEventListener('DOMContentLoaded', function() {
        // Load the stepper script dynamically if not already loaded
        if (typeof KTCreateStudentStepper === 'undefined') {
            const script = document.createElement('script');
            script.src = '{{ asset("js/operations/student-create-stepper.js") }}';
            script.onload = function() {
                if (typeof KTCreateStudentStepper !== 'undefined') {
                    KTCreateStudentStepper.init();
                }
            };
            document.head.appendChild(script);
        } else {
            KTCreateStudentStepper.init();
        }

        // Initialize Select2 for all select elements in the modal
        if (typeof $ !== 'undefined' && $.fn.select2) {
            $('[data-control="select2"]').select2({
                minimumResultsForSearch: -1,
                dropdownParent: $('.modal')
            });
        }

        // Initialize tooltips
        if (typeof KTApp !== 'undefined' && KTApp.initBootstrapTooltips) {
            KTApp.initBootstrapTooltips();
        }
    });
</script>
<!--end::Modal scripts-->
