<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassSubject extends Model
{
    protected $fillable = [
        'school_class_id', 
        'subject_id',      
        'teacher_id',      
    ];

    public function schoolClass()
    {
        return $this->belongsTo(\App\Models\SchoolClass::class, 'school_class_id', 'id');
    }

    public function subject()
    {
        return $this->belongsTo(\App\Models\Subject::class, 'subject_id', 'id');
    }

    public function teacher()
    {
        return $this->belongsTo(\App\Models\Employee::class, 'teacher_id', 'id');
    }
}
