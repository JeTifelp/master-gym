<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Libro;

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
        //$libros = Libro:: all();
        $libros = Libro:: paginate(3);
        return view('Libros.index',[
            'libros' => $libros,
        ]);//  no se pone el .blade.php

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        if(!Auth::check()){
            return redirect()->route('libros.index');
        }
        return view('libros.create'); //hay que crear esa vista  create.blade.php
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:5|max:255',
            'autor' => 'required|min:5|max:255',
            'genero' => 'required|min:5|max:255',
            'editorial' => 'required|min:5|max:255',
            'descripcion' => 'required|min:5',
        ]);
        //return $request->all();
        $libro = new Libro();
        $libro->nombre = $request->nombre;
        $libro->autor = $request->autor;
        $libro->genero = $request->genero;
        $libro->editorial = $request->editorial;
        $libro->descripcion = $request->descripcion;
        $libro->save();
        return redirect()->route('libros.index')->with('status','NUevo Libro Creado');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $libro = Libro:: findOrFail($id);
        return view('Libros.show',[ // crear vista show.balde.php
            'libro' => $libro,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Auth::check()){
            return redirect()->route('libros.index');
        }
        //
        $libro = Libro:: findOrFail($id);
        return view('Libros.edit',[ ///crear vista edit.blade.php
            'libro' => $libro,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $libro = Libro:: findOrFail($id); //consultamos este registro
        //reemplazamos los valores
        $libro->nombre = $request->nombre;
        $libro->autor = $request->autor;
        $libro->genero = $request->genero;
        $libro->editorial = $request->editorial;
        $libro->descripcion = $request->descripcion;
        $libro->save();
        return redirect()->route('libros.index')->with('status','Libro Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Auth::check()){
            return redirect()->route('libros.index');
        }
        // de la vista viene directo al controlador
        $libro = Libro:: findOrFail($id);
        $libro->delete();
        return redirect()->route('libros.index')->with('status','El Libro fue eliminado');
    }
}
