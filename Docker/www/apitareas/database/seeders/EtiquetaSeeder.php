<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EtiquetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('etiquetas')->insert([
            'nombre'=>'Clase',
        ]);
        DB::table('etiquetas')->insert([
            'nombre'=>'Otros',
        ]);
    }
}
