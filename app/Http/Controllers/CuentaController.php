<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CuentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //DB::table('clases')->get()->pluck('id','codigo')->dd();
        
        $clase = DB::table('clases')->get()->pluck('id','codigo');
        $clas = DB::table('clases')->get()->pluck('id','nombre');

        $cuenta = DB::table('cuentas')->get();
        $cl = DB::table('clases')->get();
        
        return view('cuentas.create')
            ->with('clase',$clase)
            ->with('clas',$clas)
            ->with('cl',$cl)
            ->with('cuenta',$cuenta);
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
          $data=request();
        DB::table('cuentas')->insert([
            'codigo'=>$data['codigo'],
            'nombre'=>$data['nombre'],
            'valor'=>$data['valor'],
            'clases_id'=>$data['clases']
        ]);
        //dd( $request->all() );
        $clase = DB::table('clases')->get()->pluck('id','codigo');
        $clas = DB::table('clases')->get()->pluck('id','nombre');
        
        $cuenta = DB::table('cuentas')->get();
        $cl = DB::table('clases')->get();
        
        return view('cuentas.create')
            ->with('clase',$clase)
            ->with('clas',$clas)
            ->with('cl',$cl)
            ->with('cuenta',$cuenta);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function show(Cuenta $cuenta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function edit(Cuenta $cuenta)
    {
        //
        return view('cuentas.edit')
            ->with('cuenta',$cuenta);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cuenta $cuenta)
    {
        //
        $request->validate([
            'codigo' => 'required',
            'nombre' => 'required',
            'valor' => 'required',
        ]);

        $cuenta->codigo = $request->codigo;
        $cuenta->nombre = $request->nombre;
        $cuenta->valor = $request->valor;

        $cuenta->save();

        return redirect()->route('cuentas.create',$cuenta);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cuenta $cuenta)
    {
        //
        $cuenta->delete();

        return redirect()->route('cuentas.create',$cuenta);
    }
}
