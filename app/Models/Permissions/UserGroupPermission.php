<?php

namespace App\Models\Permissions;

use Illuminate\Database\Eloquent\Model;

class UserGroupPermission extends Model
{
    protected $table = 'user_group_permissions';
    // protected $primaryKey = 'ID';
    // protected $fillable = [
    //     'group_name'
    //   ];


      public function group()
      {
        return $this->belongsTo('App\Models\Permissions\UserGroup', 'user_group_id');
      }
}
