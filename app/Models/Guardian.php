<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    protected $fillable = [
        'student_id',
        'name',
        'relation',
        'phone',
        'mobile_no',
        'email',
        'occupation',
        'address',
        'remarks',
        'guardian_attachment',
        'guardian_pic',        
    ];

    
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
