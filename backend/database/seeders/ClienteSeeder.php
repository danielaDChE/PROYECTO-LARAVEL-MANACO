<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Insertar registros a la tabla clientes

         DB::table('clientes')->insert([
        [   
            'nombres'=> 'Daniela Pamela',
            'apellidos'=> 'Chipana Echave',
            'direccion'=> 'kupini Rogelio Carrillo n°300',
            'celular'=> '74053390',
            'nit'=> '10013571012',
            'created_at'=> now(),
            'updated_at'=> now(),
        ],
        [   
            'nombres'=> 'Martin Eduardo',
            'apellidos'=> 'Sosa Quispe',
            'direccion'=> 'Miraflores Av.Villaroel n°025',
            'celular'=> '73006587',
            'nit'=> '2714715014',
            'created_at'=> now(),
            'updated_at'=> now(),
        ]
        ]);
    }
}
