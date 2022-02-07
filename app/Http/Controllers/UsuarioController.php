<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User:: paginate(3);
        return view('crud.Usuarios.index',[
            'usuarios' => $usuarios,
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
        return view('crud.Usuarios.create');
        //return view('auth.register');
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
        $usuario = new User();
        $usuario->nombres = $request->nombres;
        $usuario->apellidos = $request->apellidos;
        $usuario->telefono = $request->telefono;
        $usuario->fecha_nacimiento = $request->fecha_nacimiento;
        $usuario->tipo = $request->tipo;
        $usuario->estado = 1;
        $usuario->estilo = 1;
        $usuario->email = $request->email;
        $usuario->password = $request->password;
        
        $usuario->save();
        return redirect()->route('usuarios.index')->with('status','NUevo Usuario Creado');

        // return User::create([
        //     'nombres' => $request['nombres'],
        //     'apellidos' => $request['apellidos'],
        //     'telefono' => $request['telefono'],
        //     'fecha_nacimiento' => $request['fecha_nacimiento'],
        //     'tipo' => $request['tipo'],
        //     'estado' => 1,
        //     'estilo' => 1,
        //     'email' => $request['email'],
        //     'password' => Hash::make($request['password']),
        // ]);

        
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
         $usuario = User:: findOrFail($id);
        return view('crud.Usuarios.show',[ // crear vista show.balde.php
            'usuario' => $usuario,
        ]);
        return $usuario;
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
        $usuario = User:: findOrFail($id);
        return view('crud.Usuarios.edit',[ ///crear vista edit.blade.php
            'usuario' => $usuario,
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
        $usuario = User:: findOrFail($id); //consultamos este registro
        //reemplazamos los valores       
        
        $usuario->nombres = $request->nombres;
        $usuario->apellidos = $request->apellidos;
        $usuario->telefono = $request->telefono;
        $usuario->fecha_nacimiento = $request->fecha_nacimiento;
        $usuario->tipo = $request->tipo;
        $usuario->estado = 1;
        $usuario->estilo = 1;
        $usuario->email = $request->email;
        $usuario->password = $request->password;
        $usuario->save();
        return redirect()->route('usuarios.index')->with('status','Usuario Actualizado...');
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
        $usuario = User:: findOrFail($id);
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('status','Usuario Elimininado...');
    }

    public function CambiarTema()
    {
        $usuario = User::findOrFail(\Auth::user()->id);
        if($usuario->estilo==1){
            $usuario->estilo=2;
        }else{
            if($usuario->estilo==2){
                $usuario->estilo=3;
            }else{
                $usuario->estilo=1;
            }
        }
        $usuario->update();
        return redirect('/index');
    }
}
