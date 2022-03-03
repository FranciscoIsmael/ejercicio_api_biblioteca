<?php

use App\LibrosPrestados;
use Illuminate\Database\Seeder;

class LibrosPrestadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $canLibrosPrestados = 5;
        factory(LibrosPrestados::class)->times($canLibrosPrestados)->create();
    }
}
