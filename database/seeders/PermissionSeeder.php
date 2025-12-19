<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['name' => 'view_config_admin', 'label' => 'Ver Configurações Administrativas'],

            ['name' => 'view_user', 'label' => 'Ver User'],
            ['name' => 'create_user', 'label' => 'Criar User'],
            ['name' => 'edit_user', 'label' => 'Editar User'],
            ['name' => 'delete_user', 'label' => 'Excluir User'],

            ['name' => 'view_contact', 'label' => 'Ver Contato'],
            ['name' => 'create_contact', 'label' => 'Criar Contato'],
            ['name' => 'edit_contact', 'label' => 'Editar Contato'],
            ['name' => 'delete_contact', 'label' => 'Excluir Contato'],

            ['name' => 'view_post', 'label' => 'Ver Post'],
            ['name' => 'create_post', 'label' => 'Criar Post'],
            ['name' => 'edit_post', 'label' => 'Editar Post'],
            ['name' => 'delete_post', 'label' => 'Excluir Post'],

        ];

        foreach ($permissions as $perm) {
            DB::table('permissions')->insert([
                'name' => $perm['name'],
                'label' => $perm['label'],
                'created_at' => now(),
            ]);
        }
    }
}
