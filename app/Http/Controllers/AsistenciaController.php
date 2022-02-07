<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Asistencia;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $asistencias = DB::table('asistencia as a')
            ->join('users as u', 'u.id', '=', 'a.id_usuario')
            ->select('a.*','u.nombres as UN','u.apellidos as UA')->get();
        //->paginate(1);
        //return view('estudiante.index',['estudiantes'=>$estudiantes]);
       // return $asistencias;//view('crud.asistencia.index');
       return view('crud.Asistencias.index',[
        'asistencias' => $asistencias,
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
        $socios = User::where('tipo','=',2)->pluck('nombres','id');
        //return $socios;
        return view('crud.Asistencias.create',[
            'socios' => $socios,
        ]);
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
            'fecha'=>'required',
            'hora'=>'required|numeric',
            'presencia'=>'required|numeric',
            'id_usuario'=>'required',
        ]);
        //
        //return $request->all();
        $asistencia = new Asistencia();
        $asistencia->fecha = $request->fecha;
        $asistencia->hora = $request->hora;
        $asistencia->presencia = $request->presencia;

               
        $asistencia->id_usuario = $request->id_usuario;
    
        $asistencia->save();
        return redirect()->route('asistencias.index')->with('status','NUeva Asistencia Creado');
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
        $asistencia = Asistencia:: findOrFail($id);
        return view('crud.Asistencias.show',[ // crear vista show.balde.php
            'asistencia' => $asistencia,
        ]);
        return $asistencia;
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
        $socios = User::where('tipo','=',2)->pluck('nombres','id');
        //return $socios;
        $asistencia = Asistencia:: findOrFail($id);
        
        return view('crud.Asistencias.edit',[
            'socios' => $socios,
            'asistencia' => $asistencia,
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
        $request->validate([
            'fecha'=>'required',
            'hora'=>'required|numeric',
            'presencia'=>'required|numeric',
            'id_usuario'=>'required',
        ]);
        //
        $asistencia = Asistencia:: findOrFail($id); //consultamos este registro
        //reemplazamos los valores       
        
        $asistencia->fecha = $request->fecha;
        $asistencia->hora = $request->hora;
        $asistencia->presencia = $request->presencia;       
        
        $asistencia->id_usuario = $request->id_usuario;
        
        $asistencia->save();
        return redirect()->route('asistencias.index')->with('status','Asistencia Actualizado...');
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
        $asistencia = Asistencia:: findOrFail($id);
        $asistencia->delete();
        return redirect()->route('asistencias.index')->with('status','Asistencia Elimininado...');
    }
}
