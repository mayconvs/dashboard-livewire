<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserPasswordService
{
    public function change(User $user, string $newPassword)
    {
        $user->password = Hash::make($newPassword);
        $user->save();

        return $user;
    }
}
