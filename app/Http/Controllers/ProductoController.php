<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productos = Producto:: paginate(3);
        return view('crud.Productos.index',[
            'productos' => $productos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('crud.Productos.create');
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
            'nombre'=>'required|max:30',
        ]);
        //
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        
        $producto->save();
        return redirect()->route('productos.index')->with('status','NUevo Producto Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $producto = Producto:: findOrFail($id);
        return view('crud.Productos.show',[ // crear vista show.balde.php
            'producto' => $producto,
        ]);
        return $producto;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $producto = Producto:: findOrFail($id);
        return view('crud.Productos.edit',[ // crear vista show.balde.php
            'producto' => $producto,
        ]);
        return $producto;
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
        $request->validate([
            'nombre'=>'required|max:30',
        ]);
        //
        $producto = Producto:: findOrFail($id); //consultamos este registro
        //reemplazamos los valores       
        
        $producto->nombre = $request->nombre;
        
        $producto->save();
        return redirect()->route('productos.index')->with('status','Producto Actualizado...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $producto = Producto:: findOrFail($id);
        $producto->delete();
        return redirect()->route('productos.index')->with('status','Producto Elimininado...');
    }
}
