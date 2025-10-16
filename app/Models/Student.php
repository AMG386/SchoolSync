<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'admission_no',
        'first_name',
        'last_name',
        'dob',
        'gender',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'country',
        'aadhaar_card',
        'aadhaar_number',
        'photo',
        'admission_date',
        'status',
        'documents',
        'remarks',
    ];

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
