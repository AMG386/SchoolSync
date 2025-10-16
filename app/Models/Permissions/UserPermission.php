<?php

namespace App\Models\Permissions;

use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
	protected $table = 'user_permissions';
    // public function users()
    // {
    //     return $this
    //         ->belongsToMany('App\User')
    //         ->withTimestamps();
    // }
}
