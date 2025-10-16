<?php

namespace App\Models\Permissions;

use Illuminate\Database\Eloquent\Model;

class UserGroupSpecialPermission extends Model
{
    protected $table = 'user_group_special_permissions';
    // protected $primaryKey = 'ID';
    // protected $fillable = [
    //     'group_name'
    //   ];


      public function group()
      {
        return $this->belongsTo('App\Models\Permissions\UserGroup', 'user_group_id');
      }
      public function role()
      {
        return $this->belongsTo('App\Models\Permissions\Role', 'role_id');
      }
      public function specialpermission()
      {
        return $this->belongsTo('App\Models\Permissions\UserGroupSpecialPermission', 'special_permission_id');
      }
}
