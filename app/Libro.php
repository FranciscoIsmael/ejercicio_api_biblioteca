<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    // public $transformer = LibroTransformer::class;
    //
    protected $fillable = [
        'titulo', 'descripcion',
    ];


    public function Usuarios(){
        return $this->belongsToMany(Usuario::class)->withTimestamps();
    }
}
