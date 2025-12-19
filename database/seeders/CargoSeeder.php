<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CargoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('cargos')->insert([
            ['name' => 'Diretor', 'created_at' => Carbon::now()],
            ['name' => 'Programador', 'created_at' => Carbon::now()],
            ['name' => 'Gerente Comercial', 'created_at' => Carbon::now()],
            ['name' => 'Vendedor', 'created_at' => Carbon::now()],
            ['name' => 'Projetista', 'created_at' => Carbon::now()],
            ['name' => 'Revisor de Projeto', 'created_at' => Carbon::now()],
            ['name' => 'Atendimento', 'created_at' => Carbon::now()],
            ['name' => 'Financeiro', 'created_at' => Carbon::now()],
            ['name' => 'Instalador', 'created_at' => Carbon::now()],
            ['name' => 'Suporte Técnico', 'created_at' => Carbon::now()],
            ['name' => 'Marketing', 'created_at' => Carbon::now()],
        ]);
    }
}
