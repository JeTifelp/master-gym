<?php

use Illuminate\Database\Seeder;
use App\Libro;

class LibroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Libro::class, 50)->create();
        // Libro::create([
        //     'nombre' => 'Padre Rico, padre pobre',
        //     'autor' => 'Robeth Maicol',
        //     'genero' => 'Finanzas',
        //     'editorial' => 'Del Bolsillo',
        //     'descripcion' => 'Lorem ipsum  ',
        // ]);
        // Libro:: create([
        //     'nombre' => 'El principito',
        //     'autor' => 'Antonio',
        //     'genero' => 'Novela',
        //     'editorial' => 'Carpus',
        //     'descripcion' => 'Lorem ipsum2',
        // ]);
    }
}
