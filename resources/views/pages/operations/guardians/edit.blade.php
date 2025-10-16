<div class="modal-header">
    <h5 class="modal-title" id="guardianModalLabel">Edit Guardian</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">
    <form id="fmEditGuardian">
        @csrf
        {{ method_field('PUT') }}
        <input type="hidden" id="submiturl" value="guardians/{{ $guardian->id }}">
        @if(!empty($redirect))
            <input type="hidden" id="redirecturl" name="redirecturl" value="{{ $redirect }}">
        @endif

        <ul class="nav nav-tabs mb-3" id="guardianTab" role="tablist">
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

        <div class="tab-content" id="guardianTabContent">
            <!-- Basic Info -->
            <div class="tab-pane fade show active" id="basic" role="tabpanel">
                <div class="row g-3">
                    @include('layouts.common._col-select', [
                        'label' => 'Student',
                        'name' => 'student_id',
                        'elements' => $students ?? [],
                        'value' => old('student_id', $guardian->student_id),
                        'placeholder' => 'Select student',
                        'class' => 'col-md-6'
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'name',
                        'label' => 'Guardian Name',
                        'class' => 'col-md-6',
                        'value' => old('name', $guardian->name)
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'relation',
                        'label' => 'Relation',
                        'class' => 'col-md-6',
                        'value' => old('relation', $guardian->relation)
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'occupation',
                        'label' => 'Occupation',
                        'class' => 'col-md-6',
                        'value' => old('occupation', $guardian->occupation)
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
                        'class' => 'col-md-4',
                        'value' => old('phone', $guardian->phone)
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'mobile_no',
                        'label' => 'Mobile No',
                        'class' => 'col-md-4',
                        'value' => old('mobile_no', $guardian->mobile_no)
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'email',
                        'name' => 'email',
                        'label' => 'Email',
                        'class' => 'col-md-4',
                        'value' => old('email', $guardian->email)
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'address',
                        'label' => 'Address',
                        'class' => 'col-md-12',
                        'value' => old('address', $guardian->address)
                    ])
                </div>
            </div>

            <!-- Documents -->
            <div class="tab-pane fade" id="documents" role="tabpanel">
                <div class="row g-3">
                    @include('layouts.common._col-input', [
                        'type' => 'file',
                        'name' => 'guardian_attachment',
                        'label' => 'Attachment Proof',
                        'class' => 'col-md-6',
                    ])
                    @if($guardian->guardian_attachment)
                        <div class="col-md-6">
                            <a href="{{ asset($guardian->guardian_attachment) }}" target="_blank">Current Attachment</a>
                        </div>
                    @endif

                    @include('layouts.common._col-input', [
                        'type' => 'file',
                        'name' => 'guardian_pic',
                        'label' => 'Guardian Picture',
                        'class' => 'col-md-6',
                    ])
                    @if($guardian->guardian_pic)
                        <div class="col-md-6">
                            <img src="{{ asset($guardian->guardian_pic) }}" alt="Guardian Pic" class="rounded-circle border" width="100">
                        </div>
                    @endif
                </div>
            </div>

            <!-- Remarks -->
            <div class="tab-pane fade" id="remarks" role="tabpanel">
                <div class="row g-3">
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'remarks',
                        'label' => 'Remarks',
                        'class' => 'col-md-12',
                        'value' => old('remarks', $guardian->remarks)
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
