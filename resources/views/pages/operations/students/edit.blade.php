<!--begin::Modal header-->
<div class="modal-header">
    <h5 class="modal-title" id="studentModalLabel">Edit Student</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>
<!--end::Modal header-->

<!--begin::Modal body-->
<div class="modal-body">
    <form id="fmEditStudent" enctype="multipart/form-data">
        @csrf
        {{ method_field('PUT') }}
        <input type="hidden" id="submiturl" value="students/{{ $student->id }}">
        @if (!empty($redirect))
            <input type="hidden" id="redirecturl" name="redirecturl" value="{{ $redirect }}">
        @endif

        <ul class="nav nav-tabs mb-3" id="studentTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="basic-tab" data-bs-toggle="tab" data-bs-target="#basic" type="button" role="tab">Basic Info</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab">Contact</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="documents-tab" data-bs-toggle="tab" data-bs-target="#documents" type="button" role="tab">Documents</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="remarks-tab" data-bs-toggle="tab" data-bs-target="#remarks" type="button" role="tab">Remarks</button>
            </li>
        </ul>

        <div class="tab-content" id="studentTabContent">
            <!-- Basic Info -->
            <div class="tab-pane fade show active" id="basic" role="tabpanel">
                <div class="row g-3">
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'admission_no',
                        'label' => 'Admission No',
                        'value' => $student->admission_no,
                        'class' => 'col-md-6',
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'first_name',
                        'label' => 'First Name',
                        'value' => $student->first_name,
                        'class' => 'col-md-6',
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'last_name',
                        'label' => 'Last Name',
                        'value' => $student->last_name,
                        'class' => 'col-md-6',
                    ])
                    @include('layouts.common._col-select', [
                        'label' => 'Gender',
                        'name' => 'gender',
                        'elements' => config('constants.gender'),
                        'placeholder' => 'Select gender',
                        'value' => $student,
                        'class' => 'col-md-6',
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'date',
                        'name' => 'dob',
                        'label' => 'Date of Birth',
                        'value' => $student->dob,
                        'class' => 'col-md-6',
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'date',
                        'name' => 'admission_date',
                        'label' => 'Admission Date',
                        'value' => $student->admission_date,
                        'class' => 'col-md-6',
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'aadhaar_number',
                        'label' => 'Aadhaar Number',
                        'value' => $student->aadhaar_number,
                        'class' => 'col-md-6',
                    ])
                    @include('layouts.common._col-select', [
                        'label' => 'Class',
                        'name' => 'class_id',
                        'elements' => $classes ?? [],
                        'placeholder' => 'Select class',
                        'value' => $student->class_id,
                        'class' => 'col-md-6',
                    ])
                    @include('layouts.common._col-select', [
                        'label' => 'Section',
                        'name' => 'section_id',
                        'elements' => $sections ?? [],
                        'placeholder' => 'Select section',
                        'value' => $student->section_id,
                        'class' => 'col-md-6',
                    ])
                </div>
            </div>

            <!-- Contact Info -->
            <div class="tab-pane fade" id="contact" role="tabpanel">
                <div class="row g-3">
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'phone',
                        'label' => 'Phone',
                        'value' => $student->phone,
                        'class' => 'col-md-4',
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'email',
                        'label' => 'Email',
                        'value' => $student->email,
                        'class' => 'col-md-4',
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'city',
                        'label' => 'City',
                        'value' => $student->city,
                        'class' => 'col-md-4',
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'state',
                        'label' => 'State',
                        'value' => $student->state,
                        'class' => 'col-md-4',
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'country',
                        'label' => 'Country',
                        'value' => $student->country,
                        'class' => 'col-md-4',
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'zip',
                        'label' => 'ZIP Code',
                        'value' => $student->zip,
                        'class' => 'col-md-4',
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'address',
                        'label' => 'Address',
                        'value' => $student->address,
                        'class' => 'col-md-12',
                    ])
                </div>
            </div>
            <!-- Documents -->
            <div class="tab-pane fade" id="documents" role="tabpanel">
                <div class="row g-3">
                    @include('layouts.common._col-input', [
                        'type' => 'file',
                        'name' => 'aadhaar_card',
                        'label' => 'Aadhaar Card',
                        'value' => $student->aadhaar_card,
                        'class' => 'col-md-6',
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'file',
                        'name' => 'photo',
                        'label' => 'Student Photo',
                        'value' => $student->photo,
                        'class' => 'col-md-6',
                    ])
                </div>
            </div>

            <!-- Remarks -->
            <div class="tab-pane fade" id="remarks" role="tabpanel">
                <div class="row g-3">
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'remarks',
                        'label' => 'Remarks',
                        'value' => $student->remarks,
                        'class' => 'col-md-12',
                    ])
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary btnSave">Save</button>
        </div>
    </form>
</div>
<!--end::Modal body-->

