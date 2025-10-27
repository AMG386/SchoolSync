<?php  

namespace App\Models;  

use Illuminate\Database\Eloquent\Model;  

class Standard extends Model  
{  
    protected $fillable = [  
        'standard',  
    ];  
    public function schoolClasses()
    {
        return $this->hasMany(SchoolClass::class, 'class_name', 'id');
    }
}
