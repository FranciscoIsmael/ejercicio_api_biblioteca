<?php

namespace App\Http\Controllers;

use App\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return $this->showAll(Libro::all());
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
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            
        ];
        $messages = [
            'titulo' => 'El campo :attribute es obligatorio.',
            'descripcion' => 'El campo :attribute es obligatorio',
            
        ];
        $validatedData = $request->validate($rules, $messages);
        // $validatedData['contraseña'] = bcrypt($validatedData['contraseña']);
        $libro = Libro::create($validatedData);
        return $this->showOne($libro,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro)
    {
        //
        return $this->showOne($libro);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit(Libro $libro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Libro $libro)
    {
        //
        $rules = [
            'titulo' => 'min:5|max:255',
            // 'email' => ['email', Rule::unique('usuarios')->ignore($usuario->id)],
            'descripcion' => 'min:6', // si no hacemos ninguna validacion para este, debemos ponerle '' aunque sea para tenerlo disponible en la vista
        ];
        $validatedData = $request->validate($rules);

        // if ($request->filled('titulo')){
        //     $validatedData['contraseña'] = bcrypt($request->input('contraseña'));
        // }

        $libro->fill($validatedData);

        if(!$libro->isDirty()){
            return response()->json(['error'=>['code' => 422, 'message' => 'please specify at least one different value' ]], 422);
        }
        $libro->save();
        return $this->showOne($libro);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libro $libro)
    {
        //
        $libro->delete();
        return $this->showOne($libro);
    }
}
