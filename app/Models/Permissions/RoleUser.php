<?php

namespace App\Models\Permissions;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
	protected $table = 'role_user';
    // public function users()
    // {
    //     return $this
    //         ->belongsToMany('App\User')
    //         ->withTimestamps();
    // }
}
