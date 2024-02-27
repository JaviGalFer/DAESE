<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TareaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tareas')->insert([
            'nombre'=>'Hacer proyecto',
            'descripcion'=>'hay que terminar el proyecto',
        ]);
        DB::table('tareas')->insert([
            'nombre'=>'Entregar',
            'descripcion'=>'Hay que entregar el proyecto',
        ]);
        DB::table('tareas')->insert([
            'nombre'=>'Descansar',
            'descripcion'=>'Tomate un descansooo',
        ]);DB::table('tareas')->insert([
            'nombre'=>'OootraTarea',
            'descripcion'=>'Tomate un descansooo',
        ]);
    }
}
