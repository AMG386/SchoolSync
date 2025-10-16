<?php

namespace App\Models\Permissions;

use Illuminate\Database\Eloquent\Model;

class RoleSpecialPermission extends Model
{
	protected $table = 'role_special_permissions';
    // public function users()
    // {
    //     return $this
    //         ->belongsToMany('App\User')
    //         ->withTimestamps();
    // }
}
