<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategorySeeder::class); // Creamos las categorias por defecto
        if (App::environment('local')) {
            $this->call(TaskSeeder::class); // Creamos algunas task con factory para tener contenido si el entorno es local
        }
    }
}
