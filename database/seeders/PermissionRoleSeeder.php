<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionRoleSeeder extends Seeder
{
    public function run(): void
    {
        // Admin recebe todas
        $allPermissions = DB::table('permissions')->pluck('id');

        foreach ($allPermissions as $permId) {
            DB::table('permission_role')->insert([
                'role_id' => 1, // admin
                'permission_id' => $permId,
            ]);
        }

        $userPermissions = [
            'view_user',
            'view_contact',
            'create_contact',
            'edit_contact',
            'delete_contact',
            'view_post',
            'create_post',
            'edit_post',
            'delete_post',
        ];
        
        foreach ($userPermissions as $permName) {
            DB::table('permission_role')->insert([
                'role_id' => 2,
                'permission_id' => DB::table('permissions')->where('name', $permName)->value('id'),
            ]);
        }
    }
}
