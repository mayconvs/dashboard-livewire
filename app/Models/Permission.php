<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name', 'label'];

    /** Uma permissão pertence a várias roles */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'permission_role');
    }
}
