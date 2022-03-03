<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrosPrestadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // TABLA PIVOTE ENTRE USUARIOS Y LIBROS
        Schema::create('libro_usuario', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('usuario_id')->unsigned()->nullable();
            $table->integer('libro_id')->unsigned()->nullable();


            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('libro_id')->references('id')->on('libros')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libro_usuario');
    }
}
