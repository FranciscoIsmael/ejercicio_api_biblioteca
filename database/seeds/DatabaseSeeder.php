<?php

use App\Libro;
use App\Usuario;
use App\LibrosPrestados;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Schema::disableForeignKeyConstraints();

        // Libro::truncate();
        // Usuario::truncate();
        DB::table('libro_usuario')->truncate();

        $this->call(UsuarioSeeder::class);
        $this->call(LibroSeeder::class);
        // $this->call(LibrosPrestadosSeeder::class);

        $cantLibrosPrestados = 3;

        for ($i=0; $i<$cantLibrosPrestados; $i++){
            $usuario = Usuario::all()->random();
            $libro = Libro::all()->random()->id;
            $usuario->libros()->attach($libro);
        }
        
        Schema::enableForeignKeyConstraints();

    }
}
