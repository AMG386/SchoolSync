<?php  

namespace App\Models;  

use Illuminate\Database\Eloquent\Model;  

class SchoolClass extends Model  
{  
    protected $fillable = [  
        'class_name',  
        'division',  
        'class_teacher',  
        'accademic_year',
    ];  
    public function classTeacherRelation()
    {
        return $this->belongsTo(Employee::class, 'class_teacher', 'id');
    }
    public function classSubjects()
    {
        return $this->hasMany(ClassSubject::class, 'school_class_id', 'id');
    }
    public function classname()
    {
        return $this->belongsTo(Standard::class, 'class_name', 'id');
    }
}
