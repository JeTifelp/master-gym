<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Venta;
use App\Producto;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ventas = DB::table('venta as v')
            ->join('producto as p', 'p.id', '=', 'v.id_producto')
            ->select('v.*','p.nombre')->paginate(2);
        //->paginate(1);
        //return view('estudiante.index',['estudiantes'=>$estudiantes]);
       // return $asistencias;//view('crud.asistencia.index');
       return view('crud.Ventas.index',[
        'ventas' => $ventas,
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
        $productos = Producto::pluck('nombre','id');
        //return $socios;
        return view('crud.Ventas.create',[
            'productos' => $productos,
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
            'cantidad'=>'required|numeric',
            'fecha'=>'required',
            'precio'=>'required|numeric',
            'id_producto'=>'required',
    ]);
        //
        //return $request;
        $ventas = new Venta();
        $ventas->cantidad = $request->cantidad;
        $ventas->fecha = $request->fecha;
        $ventas->precio = $request->precio;
       
        $ventas->id_producto = $request->id_producto;
    
        $ventas->save();
        return redirect()->route('ventas.index')->with('status','NUeva Venta Creada');
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
        $venta = Venta:: findOrFail($id);
        return view('crud.Ventas.show',[ // crear vista show.balde.php
            'venta' => $venta,
        ]);
        return $venta;
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
        $productos = Producto::pluck('nombre','id');
        //return $socios;
        $venta = Venta:: findOrFail($id);
        
        return view('crud.Ventas.edit',[
            'productos' => $productos,
            'venta' => $venta,
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
            'cantidad'=>'required|numeric',
            'fecha'=>'required',
            'precio'=>'required|numeric',
            'id_producto'=>'required',
    ]);
        //
        $venta = Venta:: findOrFail($id); //consultamos este registro
        //reemplazamos los valores               
        
        $venta->cantidad = $request->cantidad;
        $venta->fecha = $request->fecha;
        $venta->precio = $request->precio;
       
        $venta->id_producto = $request->id_producto;
    
        $venta->save();
        return redirect()->route('ventas.index')->with('status','Venta Actualizada...');
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
        $venta = Venta:: findOrFail($id);
        $venta->delete();
        return redirect()->route('ventas.index')->with('status','Venta Elimininada...');
    }
}
