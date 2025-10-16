<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Permissions\Role;
use App\Models\Permissions\RoleSpecialPermission;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
         'Name', 'email', 'password', 'username', 'Active', 'sImgPath', 'lang', 'EmpID', 'isAdmin', 'group_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

     /*************************************************/
  // roles
  /*************************************************/
  public function roles()
  {
    return $this
      ->belongsToMany('App\Models\Permissions\Role')
      ->withTimestamps()
      ->withPivot(
        'read',
        'create',
        'edit',
        'delete',
        'approve'
      );
  }

  public function authorizeRoles($roles)
  {
    if ($this->hasAnyRole($roles)) {
      return true;
    }
    abort(401, 'This action is unauthorized.');
  }

  public function hasAnyRole($roles)
  {
    if (is_array($roles)) {
      foreach ($roles as $role) {
        if ($this->hasRole($role)) {
          return true;
        }
      }
    } else {
      if ($this->hasRole($roles)) {
        return true;
      }
    }
    return false;
  }

  public function hasRole($role)
  {
    if ($this->roles()->where('name', $role)->first()) {
      return true;
    }
    return false;
  }

  public function getRole()
  {
    return $this->roles()->first()->alias;
  }

  // public function hasDelete()
  // {
  //   return ($this->iDelete == 1) ? true : false;
  // }

  // public function hasEdit()
  // {
  //   return ($this->iEdit == 1) ? true : false;
  // }

  // public function hasGroup($role)
  // {
  //   if ($this->isAdmin == 1)
  //     return true;

  //   $per = $this->roles()->where('group', $role)->where('role_user.read', 1)->count();
  //   return $per > 0;
  // }


  public function hasRead($role)
  {
    if ($this->isAdmin == 1)
      return true;

    $rol = Role::where('name', $role)->first();
    if ($rol) {
      return $this->group->hasRead($rol->id);
    } else
      return false;
  }
  public function hasCreate($role)
  {
    if ($this->isAdmin == 1)
      return true;

    $rol = Role::where('name', $role)->first();
    if ($rol) {
      return $this->group->hasCreate($rol->id);
    } else
      return false;
  }

  public function hasDelete($role)
  {
    if ($this->isAdmin == 1)
      return true;

    $rol = Role::where('name', $role)->first();
    if ($rol) {
      return $this->group->hasDelete($rol->id);
    } else
      return false;
  }
  public function hasEdit($role)
  {
    if ($this->isAdmin == 1)
      return true;

    $rol = Role::where('name', $role)->first();
    if ($rol) {
      return $this->group->hasEdit($rol->id);
    } else
      return false;
  }
  public function hasSubmit($role)
  {
    if ($this->isAdmin == 1)
      return true;

    $rol = Role::where('name', $role)->first();
    if ($rol) {
      return $this->group->hasSubmit($rol->id);
    } else
      return false;
  }
  public function hasApprove($role)
  {
    if ($this->isAdmin == 1)
      return true;

    $rol = Role::where('name', $role)->first();
    if ($rol) {
      return $this->group->hasApprove($rol->id);
    } else
      return false;
  }
  public function hasUnapprove($role)
  {
    if ($this->isAdmin == 1)
      return true;

    $rol = Role::where('name', $role)->first();
    if ($rol) {
      return $this->group->hasUnapprove($rol->id);
    } else
      return false;
  }

  public function hasManage($role)
  {
    if ($this->isAdmin == 1)
      return true;

    $rol = Role::where('name', $role)->first();
    if ($rol) {
      return $this->group->hasManage($rol->id);
    } else
      return false;
  }

  public function hasAnyRead($roles)
  {
    if (is_array($roles)) {
      foreach ($roles as $role) {
        if ($this->hasRead($role)) {
          return true;
        }
      }
    } else {
      if ($this->hasRead($roles)) {
        return true;
      }
    }
    return false;
  }


  //special permission
  public function hasSpecialPermission($sp_id)
  {
    if ($this->isAdmin == 1)
      return true;

    $rolsp = RoleSpecialPermission::find($sp_id);
    if ($rolsp) {
      return $this->group->hasSpecialPermission($rolsp->role_id, $sp_id);
    } else
      return false;
  }

  /*************************************************/
  // users
  /*************************************************/
  public function employee()
  {
    return $this->belongsTo('App\Models\Employee', 'EmpID');
  }

  public function group()
  {
    return $this->belongsTo('App\Models\Permissions\UserGroup', 'group_id');
  }

  // public function displayName()
  // {
  //     // $emp = $this->belongsTo('App\Models\Employee\Employee', 'EmpID');
  //     // dd()
  //     if($this->EmpID)
  //     {
  //         $emp = Employee::find($this->EmpID);
  //         $this->DisplayName = $emp->sFirstName;
  //     }
  //     else{
  //         $this->DisplayName = $this->Name;
  //     }
  //     return $this;
  // }


  public function getDisplayNameAttribute()
  {

    if ($this->EmpID) {
      return $this->employee->first_name . ' ' . $this->employee->last_name;
    } else {
      return $this->Name;
    }

  }
  public function getShortNameAttribute()
  {
    // $emp = $this->belongsTo('App\Models\Employee\Employee', 'EmpID');
    // dd()
    if ($this->EmpID) {
      // $emp = Employee::find($this->EmpID);
      return $this->employee->first_name;
    } else {
      return $this->Name;
    }
    // return $this;
  }
}
