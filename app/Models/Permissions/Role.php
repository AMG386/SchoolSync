<?php

namespace App\Models\Permissions;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    public function users()
    {
        return $this
            ->belongsToMany('App\Models\User')
            ->withTimestamps();
    }

    public function specialpermissions()
  {
    return $this->hasMany('App\Models\Permissions\RoleSpecialPermission', 'role_id')
    ->orderBy('sl_no', 'ASC');
  }
}
