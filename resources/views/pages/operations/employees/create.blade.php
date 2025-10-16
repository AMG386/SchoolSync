<div class="modal-header">
    <h5 class="modal-title" id="patientModalLabel">New Employee</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">
    <form id="fmCreate" >
        @csrf
        <input type="hidden" id="submiturl" value="employees">
        @if (!empty($redirect))
            <input type="hidden" id="redirecturl" name="redirecturl" value="{{ $redirect }}">
        @endif

        <ul class="nav nav-tabs mb-3" id="employeeTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="basic-tab" data-bs-toggle="tab" data-bs-target="#basic"
                    type="button" role="tab">Basic Info</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button"
                    role="tab">Contact</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="job-tab" data-bs-toggle="tab" data-bs-target="#job" type="button"
                    role="tab">Job Details</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="official-tab" data-bs-toggle="tab" data-bs-target="#official"
                    type="button" role="tab">Official Details</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="salary-tab" data-bs-toggle="tab" data-bs-target="#salary" type="button"
                    role="tab">Salary & Payroll</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="identification-tab" data-bs-toggle="tab" data-bs-target="#identification"
                    type="button" role="tab">Identification</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="history-tab" data-bs-toggle="tab" data-bs-target="#history" type="button"
                    role="tab">Employment History</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="other-tab" data-bs-toggle="tab" data-bs-target="#other" type="button"
                    role="tab">Other Info</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="notes-tab" data-bs-toggle="tab" data-bs-target="#notes" type="button"
                    role="tab">Notes</button>
            </li>
        </ul>

        <div class="tab-content" id="employeeTabContent">
            <div class="tab-pane fade show active" id="basic" role="tabpanel">
                <div class="row g-3">
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'employee_id',
                        'label' => 'Employee ID',
                        'class' => 'col-md-4',
                        'value' => old('employee_id'),
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'first_name',
                        'label' => 'First Name',
                        'class' => 'col-md-4',
                        'value' => old('first_name'),
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'last_name',
                        'label' => 'Last Name',
                        'class' => 'col-md-4',
                        'value' => old('last_name'),
                    ])
                    @include('layouts.common._col-select', [
                        'label' => 'Gender',
                        'name' => 'gender',
                        'elements' => config('constants.gender'), 
                        'value' => old('gender'),
                        'placeholder' => 'Select gender',
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'date',
                        'name' => 'date_of_birth',
                        'label' => 'Date of Birth',
                        'class' => 'col-md-4',
                        'value' => old('date_of_birth'),
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'number',
                        'name' => 'age',
                        'label' => 'Age',
                        'class' => 'col-md-4',
                        'value' => old('age'),
                    ])
                    @include('layouts.common._col-select', [
                        'label' => 'Marital Status',
                        'name' => 'marital_status',
                        'elements' => config('constants.martial_status'), // REQUIRED
                        'placeholder' => 'Select marital status',
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'file',
                        'name' => 'photo',
                        'label' => 'Photo',
                        'class' => 'col-md-4',
                    ])
                </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel">
                <div class="row g-3">
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'mobile_number',
                        'label' => 'Mobile Number',
                        'class' => 'col-md-4',
                        'value' => old('mobile_number'),
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'alternate_contact_number',
                        'label' => 'Alternate Contact Number',
                        'class' => 'col-md-4',
                        'value' => old('alternate_contact_number'),
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'email',
                        'name' => 'email',
                        'label' => 'Email',
                        'class' => 'col-md-4',
                        'value' => old('email'),
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'address_street',
                        'label' => 'Street Address',
                        'class' => 'col-md-6',
                        'value' => old('address_street'),
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'address_city',
                        'label' => 'City',
                        'class' => 'col-md-6',
                        'value' => old('address_city'),
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'address_state',
                        'label' => 'State',
                        'class' => 'col-md-4',
                        'value' => old('address_state'),
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'address_pincode',
                        'label' => 'Pincode',
                        'class' => 'col-md-4',
                        'value' => old('address_pincode'),
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'address_country',
                        'label' => 'Country',
                        'class' => 'col-md-4',
                        'value' => old('address_country'),
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'emergency_contact_person',
                        'label' => 'Emergency Contact Person',
                        'class' => 'col-md-4',
                        'value' => old('emergency_contact_person'),
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'emergency_contact_number',
                        'label' => 'Emergency Contact Number',
                        'class' => 'col-md-4',
                        'value' => old('emergency_contact_number'),
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'emergency_contact_relationship',
                        'label' => 'Relationship',
                        'class' => 'col-md-4',
                        'value' => old('emergency_contact_relationship'),
                    ])
                </div>
            </div>
            <div class="tab-pane fade" id="job" role="tabpanel">
                <div class="row g-3">
                   @include('layouts.common._col-select', [
                        'label' => 'Department',
                        'name' => 'department',
                        'elements' => config('constants.department'), // REQUIRED
                        'value' => old('department'),
                        'placeholder' => 'Select department',
                    ])
                   @include('layouts.common._col-select', [
                        'label' => 'Designation',
                        'name' => 'designation',
                        'elements' => config('constants.designation'), // REQUIRED
                        'value' => old('designation'),
                        'placeholder' => 'Select designation',
                    ])
                   @include('layouts.common._col-select', [
                        'label' => 'Employee Type',
                        'name' => 'employee_type',
                        'elements' => config('constants.employee_types'), // REQUIRED
                        'value' => old('employee_types'),
                        'placeholder' => 'Select employee type',
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'date',
                        'name' => 'joining_date',
                        'label' => 'Joining Date',
                        'class' => 'col-md-4',
                        'value' => old('joining_date'),
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'date',
                        'name' => 'probation_end_date',
                        'label' => 'Probation End Date',
                        'class' => 'col-md-4',
                        'value' => old('probation_end_date'),
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'date',
                        'name' => 'confirmation_date',
                        'label' => 'Confirmation Date',
                        'class' => 'col-md-4',
                        'value' => old('confirmation_date'),
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'date',
                        'name' => 'resignation_termination_date',
                        'label' => 'Resignation/Termination Date',
                        'class' => 'col-md-4',
                        'value' => old('resignation_termination_date'),
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'reporting_manager',
                        'label' => 'Reporting Manager',
                        'class' => 'col-md-4',
                        'value' => old('reporting_manager'),
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'select',
                        'name' => 'employee_status',
                        'label' => 'Employee Status',
                        'class' => 'col-md-4',
                        'options' => [
                            'Active' => 'Active',
                            'Inactive' => 'Inactive',
                            'Resigned' => 'Resigned',
                            'Terminated' => 'Terminated',
                        ],
                        'value' => old('employee_status'),
                    ])
                </div>
            </div>
            <div class="tab-pane fade" id="official" role="tabpanel">
                <div class="row g-3">
                    @include('layouts.common._col-input', [
                        'type' => 'email',
                        'name' => 'work_email',
                        'label' => 'Work Email',
                        'class' => 'col-md-4',
                        'value' => old('work_email'),
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'work_phone_extension',
                        'label' => 'Work Phone Extension',
                        'class' => 'col-md-4',
                        'value' => old('work_phone_extension'),
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'employee_code',
                        'label' => 'Employee Code',
                        'class' => 'col-md-4',
                        'value' => old('employee_code'),
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'shift',
                        'label' => 'Shift',
                        'class' => 'col-md-4',
                        'value' => old('shift'),
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'office_location',
                        'label' => 'Office Location',
                        'class' => 'col-md-4',
                        'value' => old('office_location'),
                    ])
                  
                </div>
            </div>
            <div class="tab-pane fade" id="salary" role="tabpanel">
                <div class="row g-3">
                    @include('layouts.common._col-input', [
                        'type' => 'number',
                        'name' => 'basic_salary',
                        'label' => 'Basic Salary',
                        'class' => 'col-md-4',
                        'value' => old('basic_salary'),
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'number',
                        'name' => 'allowances',
                        'label' => 'Allowances',
                        'class' => 'col-md-4',
                        'value' => old('allowances'),
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'number',
                        'name' => 'deductions',
                        'label' => 'Deductions',
                        'class' => 'col-md-4',
                        'value' => old('deductions'),
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'number',
                        'name' => 'net_salary',
                        'label' => 'Net Salary',
                        'class' => 'col-md-4',
                        'value' => old('net_salary'),
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'bank_name',
                        'label' => 'Bank Name',
                        'class' => 'col-md-4',
                        'value' => old('bank_name'),
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'bank_account_number',
                        'label' => 'Bank Account Number',
                        'class' => 'col-md-4',
                        'value' => old('bank_account_number'),
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'ifsc_swift_code',
                        'label' => 'IFSC/SWIFT Code',
                        'class' => 'col-md-4',
                        'value' => old('ifsc_swift_code'),
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'pan_tax_id',
                        'label' => 'PAN/Tax ID',
                        'class' => 'col-md-4',
                        'value' => old('pan_tax_id'),
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'select',
                        'name' => 'payroll_cycle',
                        'label' => 'Payroll Cycle',
                        'class' => 'col-md-4',
                        'options' => ['Monthly' => 'Monthly', 'Biweekly' => 'Biweekly', 'Weekly' => 'Weekly'],
                        'value' => old('payroll_cycle'),
                    ])
                </div>
            </div>
            <div class="tab-pane fade" id="identification" role="tabpanel">
                <div class="row g-3">
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'aadhaar_national_id',
                        'label' => 'Aadhaar/National ID',
                        'class' => 'col-md-4',
                        'value' => old('aadhaar_national_id'),
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'pan_number',
                        'label' => 'PAN Number',
                        'class' => 'col-md-4',
                        'value' => old('pan_number'),
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'passport_number',
                        'label' => 'Passport Number',
                        'class' => 'col-md-4',
                        'value' => old('passport_number'),
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'driving_license_number',
                        'label' => 'Driving License Number',
                        'class' => 'col-md-4',
                        'value' => old('driving_license_number'),
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'voter_id',
                        'label' => 'Voter ID',
                        'class' => 'col-md-4',
                        'value' => old('voter_id'),
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'file',
                        'name' => 'uploaded_documents',
                        'label' => 'Uploaded Documents',
                        'class' => 'col-md-4',
                    ])
                </div>
            </div>
            <div class="tab-pane fade" id="history" role="tabpanel">
                <div class="row g-3">
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'previous_company_name',
                        'label' => 'Previous Company Name',
                        'class' => 'col-md-4',
                        'value' => old('previous_company_name'),
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'previous_job_title',
                        'label' => 'Previous Job Title',
                        'class' => 'col-md-4',
                        'value' => old('previous_job_title'),
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'number',
                        'name' => 'previous_experience',
                        'label' => 'Previous Experience (years)',
                        'class' => 'col-md-4',
                        'value' => old('previous_experience'),
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'reason_for_leaving',
                        'label' => 'Reason for Leaving',
                        'class' => 'col-md-4',
                        'value' => old('reason_for_leaving'),
                    ])
                </div>
            </div>
            <div class="tab-pane fade" id="other" role="tabpanel">
                <div class="row g-3">
                    <label class="form-label">Skills</label>
                    <textarea name="skills" class="form-control" rows="4" placeholder="Skills..."></textarea>
                    <label class="form-label">Certifications</label>
                    <textarea name="certifications" class="form-control" rows="4" placeholder="certifications..."></textarea>
                    <label class="form-label">Language Known</label>
                    <textarea name="languages_known" class="form-control" rows="4" placeholder="Languages known..."></textarea>
                    
                </div>
            </div>
            <div class="tab-pane fade" id="notes" role="tabpanel">
                <div class="row g-3">
                    <label class="form-label">Notes</label>
                    <textarea name="notes" class="form-control" rows="4" placeholder="Notes..."></textarea>
                    <label class="form-label">special notes</label>
                    <textarea name="special_notes" class="form-control" rows="4" placeholder="Special notes.."></textarea>
                </div>
        </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
    <button type="submit" class="btn btn-primary btnSave" >Save</button>
</div>
</form>
</div>
