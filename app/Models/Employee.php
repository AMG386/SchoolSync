<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $casts = [
    'subjects_assigned' => 'array',
];

    protected $fillable = [
        // Basic Information
        'employee_id',
        'first_name',
        'last_name',
        'gender',
        'date_of_birth',
        'age',
        'marital_status',
        'photo',

        
        'mobile_number',
        'alternate_contact_number',
        'email',
        'address_street',
        'address_city',
        'address_state',
        'address_pincode',
        'address_country',
        'emergency_contact_person',
        'emergency_contact_number',
        'emergency_contact_relationship',

        // Job Details
        'department',
        'designation',
        'subjects_assigned',
        'employee_type',
        'joining_date',
        'probation_end_date',
        'confirmation_date',
        'resignation_termination_date',
        'reporting_manager',
        'employee_status',

        // Official Details
        'work_email',
        'work_phone_extension',
        'employee_code',
        'shift',
        'office_location',
        'login_user_id',
        'login_password',

        // Salary & Payroll
        'basic_salary',
        'allowances',
        'deductions',
        'net_salary',
        'bank_name',
        'bank_account_number',
        'ifsc_swift_code',
        'pan_tax_id',
        'payroll_cycle',

        // Identification & Documents
        'aadhaar_national_id',
        'pan_number',
        'passport_number',
        'driving_license_number',
        'voter_id',
        'uploaded_documents',

        // Employment History
        'previous_company_name',
        'previous_job_title',
        'previous_experience',
        'reason_for_leaving',

        // Other Information
        'skills',
        'certifications',
        'languages_known',
        'notes',
    ];
      public function appointments()
    {
        return $this->hasMany(Appointment::class, 'doctor_id', 'id');
    }

    // Accessor for full name
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
    public function departmentRelation()
    {
        return $this->belongsTo(Department::class, 'department', 'id');
    }
    public function subjects()
{
    return $this->belongsTo(Subject::class, 'subjects_assigned', 'id');
}

}