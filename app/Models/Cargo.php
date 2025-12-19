<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cargo extends Model
{

    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'created_at',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
