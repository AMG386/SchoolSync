<?php

namespace App\Models\Permissions;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{

    public function users()
    {
        return $this
            ->belongsToMany('App\Models\User')
            ->withTimestamps();
    }
}
