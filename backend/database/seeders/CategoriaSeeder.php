<?php

namespace Database\Seeders;

//use Illuminate\Container\Attributes\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Insertar registros a la tabla categorias
   
        DB::table('categorias')->insert([
        [   
            'nombre'=> 'Calzados de Varon',
            'descripcion'=> 'Calzados deportivos y casuales para varones',
            'created_at'=> now(),
            'updated_at'=> now(),
        ],
        [   
            'nombre'=> 'Calzados de Dama',
            'descripcion'=> 'Calzados deportivos y casuales para damas',
            'created_at'=> now(),
            'updated_at'=> now(),
        ]
        ]);
    }
}
