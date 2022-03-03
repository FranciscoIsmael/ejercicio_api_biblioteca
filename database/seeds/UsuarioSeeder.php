<?php
use App\Usuario;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $canUser = 5;
        factory(Usuario::class)->times($canUser)->create();
    }
}
