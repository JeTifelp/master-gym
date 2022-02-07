<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\SocioRutina;
use App\User;
use App\Rutina;

class SocioRutinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $socio_rutinas = DB::table('socio_rutina as s')
            ->join('users as u', 'u.id', '=', 's.id_usuario')
            ->join('rutina as r', 'r.id', '=', 's.id_rutina')
            ->select('s.*','u.nombres as UN','u.apellidos as UA','r.nombre as RN','r.musculo as RM')->paginate(3);
        //->paginate(1);
        //return view('estudiante.index',['estudiantes'=>$estudiantes]);

        return view('crud.SocioRutinas.index',[
            'socio_rutinas' => $socio_rutinas,
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
        $rutinas = Rutina::pluck('musculo','id');
        
        return view('crud.SocioRutinas.create',[
            'socios' => $socios,
            'rutinas' => $rutinas,
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
        //
        $request->validate([
            'fecha'=>'required',
            'id_rutina'=>'required',
            'id_usuario'=>'required',
        ]);
        $socio_rutina = new SocioRutina();
        $socio_rutina->fecha = $request->fecha;        
        $socio_rutina->id_rutina = $request->id_rutina;       
        $socio_rutina->id_usuario = $request->id_usuario;
    
        $socio_rutina->save();
        return redirect()->route('sociorutinas.index')->with('status','Socio - Rutina Creada');
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
        $socio_rutina = SocioRutina:: findOrFail($id);
        return view('crud.SocioRutinas.show',[ // crear vista show.balde.php
            'socio_rutina' => $socio_rutina,
        ]);
        return $socio_rutina;
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
        $rutinas = Rutina::pluck('musculo','id');
        $socio_rutina = SocioRutina::find($id);

        return view('crud.SocioRutinas.edit',[
            'socios' => $socios,
            'rutinas' => $rutinas,
            'socio_rutina' => $socio_rutina,
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
            'fecha'=>'required',
            'id_rutina'=>'required',
            'id_usuario'=>'required',
        ]);
        // $socio_rutina = new SocioRutina();
        // $socio_rutina->fecha = $request->fecha;        
        // $socio_rutina->id_rutina = $request->id_rutina;       
        // $socio_rutina->id_usuario = $request->id_usuario;
    
        // $socio_rutina->save();
        $socio_rutina = SocioRutina::find($id);
        $socio_rutina->update($request->all());
        return redirect()->route('sociorutinas.index')->with('status','Socio - Rutina Actualizada');
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
        $socio_rutina = SocioRutina:: findOrFail($id);
        $socio_rutina->delete();
        return redirect()->route('sociorutinas.index')->with('status','Socio-Rutina Elimininado...');
    }
}
