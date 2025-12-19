<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuarios_iniciais = [
            [
                'role_id' => 1,
                'cargo_id' => 1,
                'name' => 'Diretor',
                'last_name' => 'Name',
                'email' => 'diretor@teste.com',
                'password' => Hash::make('#Aa12345'),
                'phone' => '+5584987651458',
                'username' => 'admin',
                'email_verified_at' => Carbon::now(),
                'admin_verified_at' => Carbon::now(),
                'active' => true,
                'created_at' => Carbon::now()
            ],
            [
                'role_id' => 1,
                'cargo_id' => 2,
                'name' => 'Programador',
                'last_name' => 'Name',
                'email' => env('MAIL_ADMIN'),
                'password' => Hash::make('#Aa12345'),
                'phone' => env('PHONE_ADMIN'),
                'username' => 'programdor',
                'email_verified_at' => Carbon::now(),
                'admin_verified_at' => Carbon::now(),
                'active' => true,
                'created_at' => Carbon::now()
            ],
            [
                'role_id' => 2,
                'cargo_id' => 3,
                'name' => 'Gerente Comercial',
                'last_name' => 'Name',
                'email' => 'gerente_comercial@teste.com',
                'password' => Hash::make('#Aa12345'),
                'phone' => '+5548912345678',
                'username' => 'gerente_comercial',
                'email_verified_at' => Carbon::now(),
                'admin_verified_at' => Carbon::now(),
                'active' => true,
                'created_at' => Carbon::now()
            ],
            [
                'role_id' => 3,
                'cargo_id' => 4,
                'name' => 'Vendedor',
                'last_name' => 'Name',
                'email' => 'vendedor@teste.com',
                'password' => Hash::make('#Aa12345'),
                'phone' => '+5548987654321',
                'username' => 'vendedor',
                'email_verified_at' => Carbon::now(),
                'admin_verified_at' => Carbon::now(),
                'active' => true,
                'created_at' => Carbon::now()
            ],
            [
                'role_id' => 4,
                'cargo_id' => 5,
                'name' => 'Projetista',
                'last_name' => 'Name',
                'email' => 'projetista@teste.com',
                'password' => Hash::make('#Aa12345'),
                'phone' => '+5548915478963',
                'username' => 'projetista',
                'email_verified_at' => Carbon::now(),
                'admin_verified_at' => Carbon::now(),
                'active' => true,
                'created_at' => Carbon::now()
            ],
            [
                'role_id' => 5,
                'cargo_id' => 6,
                'name' => 'Revisor de Projeto',
                'last_name' => 'Name',
                'email' => 'revisor@teste.com',
                'password' => Hash::make('#Aa12345'),
                'phone' => '+5548969874521',
                'username' => 'revisor',
                'email_verified_at' => Carbon::now(),
                'admin_verified_at' => Carbon::now(),
                'active' => true,
                'created_at' => Carbon::now()
            ],
            [
                'role_id' => 6,
                'cargo_id' => 7,
                'name' => 'Atendimento',
                'last_name' => 'Name',
                'email' => 'atendimento@teste.com',
                'password' => Hash::make('#Aa12345'),
                'phone' => '+5548935412784',
                'username' => 'atendente',
                'email_verified_at' => Carbon::now(),
                'admin_verified_at' => Carbon::now(),
                'active' => true,
                'created_at' => Carbon::now()
            ],
            [
                'role_id' => 7,
                'cargo_id' => 8,
                'name' => 'Financeiro',
                'last_name' => 'Name',
                'email' => 'financeiro@teste.com',
                'password' => Hash::make('#Aa12345'),
                'phone' => '+5548998564712',
                'username' => 'financeiro',
                'email_verified_at' => Carbon::now(),
                'admin_verified_at' => Carbon::now(),
                'active' => true,
                'created_at' => Carbon::now()
            ],
            [
                'role_id' => 8,
                'cargo_id' => 9,
                'name' => 'Instalador',
                'last_name' => 'Name',
                'email' => 'instalador@teste.com',
                'password' => Hash::make('#Aa12345'),
                'phone' => '+5548936547128',
                'username' => 'instalador',
                'email_verified_at' => Carbon::now(),
                'admin_verified_at' => Carbon::now(),
                'active' => true,
                'created_at' => Carbon::now()
            ],
            [
                'role_id' => 9,
                'cargo_id' => 10,
                'name' => 'Suporte Técnico',
                'last_name' => 'Name',
                'email' => 'suporte_tecnico@teste.com',
                'password' => Hash::make('#Aa12345'),
                'phone' => '+5548915478965',
                'username' => 'suporte',
                'email_verified_at' => Carbon::now(),
                'admin_verified_at' => Carbon::now(),
                'active' => true,
                'created_at' => Carbon::now()
            ],
            [
                'role_id' => 10,
                'cargo_id' => 11,
                'name' => 'Marketing',
                'last_name' => 'Name',
                'email' => 'marketing@teste.com',
                'password' => Hash::make('#Aa12345'),
                'phone' => '+5548923547896',
                'username' => 'marketing',
                'email_verified_at' => Carbon::now(),
                'admin_verified_at' => Carbon::now(),
                'active' => true,
                'created_at' => Carbon::now()
            ],

        ];

        foreach ($usuarios_iniciais as $user) {
            DB::table('users')->insert([
                'role_id' => $user['role_id'],
                'cargo_id' => $user['cargo_id'],
                'name' => $user['name'],
                'last_name' => $user['last_name'],
                'email' => $user['email'],
                'password' => $user['password'],
                'phone' => $user['phone'],
                'username' => $user['username'],
                'email_verified_at' => $user['email_verified_at'],
                'admin_verified_at' => $user['admin_verified_at'],
                'active' => $user['active'],
                'created_at' => $user['created_at'],
            ]);
        }

    }
}
