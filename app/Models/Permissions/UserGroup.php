<?php

namespace App\Models\Permissions;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
  protected $table = 'user_groups';
  // protected $primaryKey = 'ID';
  protected $fillable = [
    'group_name'
  ];


  public function grouppermissions()
  {
    return $this->hasMany('App\Models\Permissions\UserGroupPermission', 'user_group_id');
  }

  public function specialpermissions()
  {
    return $this->hasMany('App\Models\Permissions\UserGroupSpecialPermission', 'user_group_id');
  }


  public function hasRead($role)
  {
    $per = $this->grouppermissions()->where('role_id', $role)->first();
    return $per && ($per->read == 1);
  }
  public function hasCreate($role)
  {
    $per = $this->grouppermissions()->where('role_id', $role)->first();
    return $per && ($per->create == 1);
  }

  public function hasDelete($role)
  {
    $per = $this->grouppermissions()->where('role_id', $role)->first();
    return $per && ($per->delete == 1);
  }
  public function hasEdit($role)
  {
    $per = $this->grouppermissions()->where('role_id', $role)->first();
    return $per && ($per->edit == 1);
  }

  public function hasSubmit($role)
  {
    $per = $this->grouppermissions()->where('role_id', $role)->first();
    return $per && ($per->submit == 1);
  }

  public function hasApprove($role)
  {
    $per = $this->grouppermissions()->where('role_id', $role)->first();
    return $per && ($per->approve == 1);
  }

  public function hasUnapprove($role)
  {
    $per = $this->grouppermissions()->where('role_id', $role)->first();
    return $per && ($per->unapprove == 1);
  }

  public function hasManage($role)
  {
    $per = $this->grouppermissions()->where('role_id', $role)->first();
    return $per && ($per->manage == 1);
  }


  public function hasSpecialPermission($role, $spid)
  {
    $per = $this->specialpermissions()->where('role_id', $role)
      ->where('special_permission_id', $spid)->first();
    return $per && ($per->status == 1);
  }

  // public function hasAnyRead($roles)
  // {
  //   if (is_array($roles)) {
  //     foreach ($roles as $role) {
  //       if ($this->hasRead($role)) {
  //         return true;
  //       }
  //     }
  //   } else {
  //     if ($this->hasRead($roles)) {
  //       return true;
  //     }
  //   }
  //   return false;
  // }
}
