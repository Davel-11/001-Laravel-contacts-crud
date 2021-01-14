<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use DB;

class DirectorioSeeder extends Seeder
{
    
    public function run() {

        \DB::table('directorios')->insert([
            [
                'nombre' => 'Davel Altan',
                'direccion' => 'Zona 18',
                'telefono' => 30426463,
                'foto' => null
            ],
            [
                'nombre' => 'Adriano Ronaldo',
                'direccion' => 'Zona 17',
                'telefono' => 37464187,
                'foto' => null
            ]
        ]);
    }
}
