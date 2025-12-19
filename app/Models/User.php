<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'phone',
        'password',
        'cargo_id',
        'role_id',
        'active',
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

    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }

    /** Um usuário pertence a uma role */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function get_avatar_url()
{
    $directory = 'users/' . $this->id;

    // Verifica se a pasta existe e tem avatar
    if (Storage::disk('public')->exists($directory)) {
        $files = Storage::disk('public')->files($directory);

        $avatarFile = collect($files)->first(function ($file) {
            return str_starts_with(basename($file), 'avatar.');
        });

        if ($avatarFile) {
            return Storage::url($avatarFile) . '?v=' . $this->updated_at->timestamp;
        }
    }

    // Fallback 100% seguro usando asset() → sempre funciona
    return asset('images/avatar-default.png');
}
}
