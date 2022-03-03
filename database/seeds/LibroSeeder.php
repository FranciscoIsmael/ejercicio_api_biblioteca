<?php
use App\Libro;
use Illuminate\Database\Seeder;

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
        // Libro::truncate();
        $canLibro = 5;
        factory(Libro::class)->times($canLibro)->create();
    }
}
