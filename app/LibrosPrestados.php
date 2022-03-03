<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LibrosPrestados extends Model
{
    //
    protected $fillable = [
        'id_usuario', 'id_libro',
    ];
    protected $table = "libro_usuario";
}
