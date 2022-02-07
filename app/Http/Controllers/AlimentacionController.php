<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alimentacion;

class AlimentacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $alimentaciones = Alimentacion::paginate(3);
            return view('crud.Alimentaciones.index',[
                'alimentaciones' => $alimentaciones,    
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
        return view('crud.Alimentaciones.create');
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
            'nombre'=>'required',
        ]);
        //
        // $request->validate([
        //     'nombre' => 'required|min:5|max:255',
        //     'autor' => 'required|min:5|max:255',
        //     'genero' => 'required|min:5|max:255',
        //     'editorial' => 'required|min:5|max:255',
        //     'descripcion' => 'required|min:5',
        // ]);

        $alimentacion = new Alimentacion();
        $alimentacion->nombre = $request->nombre;
        
        $alimentacion->save();
        return redirect()->route('alimentaciones.index')->with('status','NUeva Alimentacion Creada');
        
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
        $alimentacion = Alimentacion:: findOrFail($id);
        return view('crud.Alimentaciones.show',[ // crear vista show.balde.php
            'alimentacion' => $alimentacion,
        ]);
        return $alimentacion;
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
        $alimentacion = Alimentacion:: findOrFail($id);
        return view('crud.Alimentaciones.edit',[ // crear vista show.balde.php
            'alimentacion' => $alimentacion,
        ]);
        return $alimentacion;
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
            'nombre'=>'required',
        ]);
        //
        $alimentacion = Alimentacion:: findOrFail($id); //consultamos este registro
        //reemplazamos los valores       
        
        $alimentacion->nombre = $request->nombre;
        
        $alimentacion->save();
        return redirect()->route('alimentaciones.index')->with('status','alimentacion Actualizado...');
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
        $alimentacion = Alimentacion:: findOrFail($id);
        $alimentacion->delete();
        return redirect()->route('alimentaciones.index')->with('status','alimentacion Elimininado...');
    }
}
