<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            ['id' => 1, 'name' => 'admin', 'label' => 'Administrador', 'created_at' => now()],
            ['id' => 2, 'name' => 'user', 'label' => 'Usuário', 'created_at' => now()],
            ['id' => 3, 'name' => 'vendedor', 'label' => 'Vendedor', 'created_at' => now()],
            ['id' => 4, 'name' => 'projetista', 'label' => 'Projetista', 'created_at' => now()],
            ['id' => 5, 'name' => 'revisor_projeto', 'label' => 'Revisor de Projeto', 'created_at' => now()],
            ['id' => 6, 'name' => 'atendimento', 'label' => 'Atendente', 'created_at' => now()],
            ['id' => 7, 'name' => 'financeiro', 'label' => 'Financeiro', 'created_at' => now()],
            ['id' => 8, 'name' => 'instalador', 'label' => 'Instalador', 'created_at' => now()],
            ['id' => 9, 'name' => 'suporte_tecnico', 'label' => 'Suporte Técnico', 'created_at' => now()],
            ['id' => 10, 'name' => 'marketing', 'label' => 'Marketing', 'created_at' => now()],
        ]);
    }
}
