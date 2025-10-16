<div class="modal-header">
    <h5 class="modal-title" id="studentModalLabel">New Student</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">
    <form id="fmCreate">
        @csrf
        <input type="hidden" id="submiturl" value="students">
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
                        'label' => 'Admission Number',
                        'class' => 'col-md-4',

                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'first_name',
                        'label' => 'First Name',
                        'class' => 'col-md-4',

                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'last_name',
                        'label' => 'Last Name',
                        'class' => 'col-md-4',
                       
                    ])
                    @include('layouts.common._col-select', [
                        'label' => 'Gender',
                        'name' => 'gender',
                        'elements' => config('constants.gender'),
                        'placeholder' => 'Select gender',
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'date',
                        'name' => 'admission_date',
                        'label' => 'Admission Date',
                        'class' => 'col-md-4',
                      
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'date',
                        'name' => 'dob',
                        'label' => 'Date of Birth',
                        'class' => 'col-md-4',
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'aadhaar_number',
                        'label' => 'Aadhaar Number',
                        'class' => 'col-md-4',
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
                       
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'email',
                        'name' => 'email',
                        'label' => 'Email',
                        'class' => 'col-md-4',
                        
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'address',
                        'label' => 'Address',
                        'class' => 'col-md-6',
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'city',
                        'label' => 'City',
                        'class' => 'col-md-4',

                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'state',
                        'label' => 'State',
                        'class' => 'col-md-4',
    
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'country',
                        'label' => 'Country',
                        'class' => 'col-md-4',
                    
                    ])
                    
                </div>
            </div>

            <!-- Documents -->
            <div class="tab-pane fade" id="documents" role="tabpanel">
                <div class="row g-3">
                       @include('layouts.common._col-input', [
                        'type' => 'file',
                        'name' => 'photo',
                        'label' => 'Photo',
                        'class' => 'col-md-4',
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'file',
                        'name' => 'aadhaar_card',
                        'label' => 'Aadhaar Card',
                        'class' => 'col-md-4',
                        
                    ])
                    
                    @include('layouts.common._col-input', [
                        'type' => 'file',
                        'name' => 'documents',
                        'label' => 'Uploaded Documents',
                        'class' => 'col-md-4',
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
                        'class' => 'col-md-12',
                        'value' => old('remarks'),
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
