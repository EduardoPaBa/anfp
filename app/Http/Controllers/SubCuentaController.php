<?php

namespace App\Http\Controllers;

use App\Models\SubCuenta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class SubCuentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('sub_cuentas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //DB::table('cuentas')->get()->pluck('codigo','nombre')->dd();
        
        $cuenta = DB::table('cuentas')->get()->pluck('id','codigo');
        $cue = DB::table('cuentas')->get()->pluck('id','nombre');
        $subcu = DB::table('sub_cuentas')->get();
        $cuenhumilde = DB::table('cuentas')->get();

        return view('subcuentas.create')
            ->with('cuenta',$cuenta)
            ->with('cue',$cue)
            ->with('subcu',$subcu)
            ->with('cuenhumilde',$cuenhumilde);
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
        DB::table('sub_cuentas')->insert([
            'codigo'=>$data['codigo'],
            'nombre'=>$data['nombre'],
            'valor'=>$data['valor'],
            'cuentas_id'=>$data['cuentas']
        ]);
        
        
        //REDIRECCIONANDO
        $cuenta = DB::table('cuentas')->get()->pluck('id','codigo');
        $cue = DB::table('cuentas')->get()->pluck('id','nombre');
        $subcu = DB::table('sub_cuentas')->get();
        $cuenhumilde = DB::table('cuentas')->get();

        return view('subcuentas.create')
            ->with('cuenta',$cuenta)
            ->with('cue',$cue)
            ->with('subcu',$subcu)
            ->with('cuenhumilde',$cuenhumilde);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCuenta  $subCuenta
     * @return \Illuminate\Http\Response
     */
    public function show(SubCuenta $subCuenta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCuenta  $subCuenta
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCuenta $subCuenta)
    {
        //
        return view('subcuentas.edit')
            ->with('subCuenta',$subCuenta);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCuenta  $subCuenta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCuenta $subCuenta)
    {
        //
        $request->validate([
            'codigo' => 'required',
            'nombre' => 'required',
            'valor' => 'required',
        ]);

        $subCuenta->codigo = $request->codigo;
        $subCuenta->nombre = $request->nombre;
        $subCuenta->valor = $request->valor;

        $subCuenta->save();

        return redirect()->route('sub_cuentas.create',$subCuenta);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCuenta  $subCuenta
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCuenta $subCuenta)
    {
        //
        $subCuenta->delete();

        return redirect()->route('sub_cuentas.create',$subCuenta);
    }
}
