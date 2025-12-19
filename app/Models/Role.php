<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    protected $fillable = ['id', 'name', 'label'];

    /** Um cargo tem muitos usuários */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /** Um cargo pode ter muitas permissões */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_role');
    }
}

