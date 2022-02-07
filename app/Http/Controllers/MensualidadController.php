<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mensualidad;
use App\User;
use App\Promocion;
class MensualidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mensualidades = DB::table('mensualidad as m')
            ->join('users as u', 'u.id', '=', 'm.id_usuario')
            ->join('promocion as p', 'p.id', '=', 'm.id_promocion')
            ->select('m.*','u.nombres as UN','u.apellidos as UA','p.descripcion as PD')->paginate(3);
        //->paginate(1);
        //return view('estudiante.index',['estudiantes'=>$estudiantes]);
        
        //
         //return $mensualidades;
         return view('crud.Mensualidades.index',[
            'mensualidades' => $mensualidades,
        ]);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $socios = User::where('tipo','=',2)->pluck('nombres','id');
        $promociones = Promocion::pluck('descripcion','id');


        return view('crud.Mensualidades.create',[
            'socios' => $socios,
            'promociones'=>$promociones,
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
        
        //return $request->all();
        $request->validate([
            'fecha_inicio'=>'required',
            'fecha_fin'=>'required',
            'monto'=>'required|numeric',
            'id_promocion'=>'required',
            'id_usuario'=>'required',
        ]);
        $mensualidad = new Mensualidad();
        $mensualidad->fecha_inicio = $request->fecha_inicio;
        $mensualidad->fecha_fin = $request->fecha_fin;
        $mensualidad->monto = $request->monto;
        $mensualidad->id_promocion = $request->id_promocion;       
        $mensualidad->id_usuario = $request->id_usuario;
    
        $mensualidad->save();
        return redirect()->route('mensualidades.index')->with('status','NUeva Mensualidad Creada');
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
        $mensualidad = mensualidad:: findOrFail($id);
        return view('crud.mensualidades.show',[ // crear vista show.balde.php
            'mensualidad' => $mensualidad,
        ]);
        return $mensualidad;
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

        $promociones = Promocion::pluck('descripcion','id');
        //return $socios;
        $mensualidad = mensualidad:: findOrFail($id);
        
        return view('crud.Mensualidades.edit',[
            'socios' => $socios,
            'promociones' => $promociones,
            'mensualidad' => $mensualidad,
            
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
        $request->validate([
            'fecha_inicio'=>'required',
            'fecha_fin'=>'required',
            'monto'=>'required|numeric',
            'id_promocion'=>'required',
            'id_usuario'=>'required',
        ]);
        $mensualidad = new Mensualidad();
        $mensualidad->fecha_inicio = $request->fecha_inicio;
        $mensualidad->fecha_fin = $request->fecha_fin;
        $mensualidad->monto = $request->monto;
        $mensualidad->id_promocion = $request->id_promocion;       
        $mensualidad->id_usuario = $request->id_usuario;
    
        $mensualidad->save();
        return redirect()->route('mensualidades.index')->with('status','Mensualidad Actualizado');
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
        $mensualidad = Mensualidad:: findOrFail($id);
        $mensualidad->delete();
        return redirect()->route('mensualidades.index')->with('status','Mensualidad Elimininado...');
    }
}
