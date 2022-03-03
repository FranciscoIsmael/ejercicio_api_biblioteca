<?php

namespace App\Http\Controllers;

use App\Libro;
use App\LibrosPrestados;
use App\Usuario;
use Illuminate\Http\Request;

class LibrosPrestadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Usuario $usuario)
    {
        //
        $usuarios = $usuario->with('libros')->get();
        return $this->showAll($usuarios);
        // return $this->showAll(LibrosPrestados::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'usuario_id' => 'required',
            'libro_id' => 'required',
            
        ];
        $messages = [
            'usuario_id' => 'El campo :attribute es obligatorio.',
            'libro_id' => 'El campo :attribute es obligatorio',
        ];
        $validatedData = $request->validate($rules, $messages);
        // $validatedData['contraseña'] = bcrypt($validatedData['contraseña']);
        $libroPrestado = LibrosPrestados::create($validatedData);
        // $libroPrestado = Libro::create($validatedData);
        return $this->showOne($libroPrestado,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LibrosPrestados  $librosPrestados
     * @return \Illuminate\Http\Response
     */
    public function show($id_usuario)
    {
        //
        // return $this->showOne($librosPrestados, 201);
        $usuario = Usuario::find($id_usuario)->Libros;
        return $this->showAll($usuario);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LibrosPrestados  $librosPrestados
     * @return \Illuminate\Http\Response
     */
    public function edit(LibrosPrestados $librosPrestados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LibrosPrestados  $librosPrestados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LibrosPrestados $librosPrestados)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LibrosPrestados  $librosPrestados
     * @return \Illuminate\Http\Response
     */
    public function destroy(LibrosPrestados $librosPrestados /*Usuario $usuario, Libro $libro*/)
    {
        //
        // $librosPrestados->delete();
        // return $this->showOne($librosPrestados);
        // if (!$libro->Usuarios()->find($usuario->id)) {
        //     return $this->errorResponse('Este usuario no tomo prestado el libro', 404);
        // }

        // $libro->Usuarios()->detach($usuario->id);

        // return $this->showAll($libro->Usuarios);

        // if (!$libro->users()->find($usuario->id)) {
        //     return $this->errorResponse('Este usuario no tomo prestado el libro', 404);
        // }

        // $libro->users()->detach($usuario->id);

        // return $this->showAll($libro->users);

    }
}
