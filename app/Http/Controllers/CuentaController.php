<?php

namespace App\Http\Controllers;

use App\Http\Requests\CuentaFormValidation;
use App\Models\Cuenta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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

        $clase = DB::table('clases')
        ->join ('grupos','clases.grupos_id','=', 'grupos.id')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
        ->join ('users','empresas.user_id','=','users.id')
        ->select('clases.id','clases.nombre','clases.codigo','clases.grupos_id')
        ->where ('users.id','=', Auth::id())
        ->get()->pluck('id','codigo');

        $clas = DB::table('clases')
        ->join ('grupos','clases.grupos_id','=', 'grupos.id')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
        ->join ('users','empresas.user_id','=','users.id')
        ->select('clases.id','clases.nombre','clases.codigo','clases.grupos_id')
        ->where ('users.id','=', Auth::id())
        ->get()->pluck('id','nombre');

        $cl = DB::table('clases')
        ->join ('grupos','clases.grupos_id','=', 'grupos.id')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
        ->join ('users','empresas.user_id','=','users.id')
        ->select('clases.id','clases.nombre','clases.codigo','clases.grupos_id')
        ->where ('users.id','=', Auth::id())
        ->get();

        $cuenta = DB::table('cuentas')->orderBy('codigo')
        ->join ('clases','cuentas.clases_id','=', 'clases.id')
        ->join ('grupos','clases.grupos_id','=', 'grupos.id')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
        ->join ('users','empresas.user_id','=','users.id')
        ->select('cuentas.id','cuentas.codigo','cuentas.nombre','cuentas.valor','cuentas.clases_id')
        ->where ('users.id','=', Auth::id())
        ->get();

        $if = DB::table('informefinancieros')->orderBy('id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
        ->join ('users','empresas.user_id','=','users.id')
        ->select('informefinancieros.id','informefinancieros.nombre','informefinancieros.anio','informefinancieros.empresas_id')
        ->where ('users.id','=', Auth::id())
        ->get();

        $gr = DB::table('grupos')->orderBy('informefinancieros.id')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
        ->join ('users','empresas.user_id','=','users.id')
        ->select('grupos.id','grupos.nombre','grupos.codigo','grupos.informefinancieros_id')
        ->where ('users.id','=', Auth::id())
        ->get();

        return view('cuentas.create')
            ->with('clase',$clase)
            ->with('clas',$clas)
            ->with('cl',$cl)
            ->with('cuenta',$cuenta)
            ->with('if',$if)
            ->with('gr',$gr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CuentaFormValidation $request)
    {
        //
        $data=request();
        DB::table('cuentas')->insert([
            'codigo'=>$data['codigo'],
            'nombre'=>$data['nombre'],
            'valor'=>$data['valor'],
            'clases_id'=>$data['clases']
        ]);


        $clase = DB::table('clases')
        ->join ('grupos','clases.grupos_id','=', 'grupos.id')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
        ->join ('users','empresas.user_id','=','users.id')
        ->select('clases.id','clases.nombre','clases.codigo','clases.grupos_id')
        ->where ('users.id','=', Auth::id())
        ->get()->pluck('id','codigo');

        $clas = DB::table('clases')
        ->join ('grupos','clases.grupos_id','=', 'grupos.id')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
        ->join ('users','empresas.user_id','=','users.id')
        ->select('clases.id','clases.nombre','clases.codigo','clases.grupos_id')
        ->where ('users.id','=', Auth::id())
        ->get()->pluck('id','nombre');

        $cl = DB::table('clases')
        ->join ('grupos','clases.grupos_id','=', 'grupos.id')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
        ->join ('users','empresas.user_id','=','users.id')
        ->select('clases.id','clases.nombre','clases.codigo','clases.grupos_id')
        ->where ('users.id','=', Auth::id())
        ->get();

        $cuenta = DB::table('cuentas')->orderBy('codigo')
        ->join ('clases','cuentas.clases_id','=', 'clases.id')
        ->join ('grupos','clases.grupos_id','=', 'grupos.id')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
        ->join ('users','empresas.user_id','=','users.id')
        ->select('cuentas.id','cuentas.codigo','cuentas.nombre','cuentas.valor','cuentas.clases_id')
        ->where ('users.id','=', Auth::id())
        ->get();

        $if = DB::table('informefinancieros')->orderBy('id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
        ->join ('users','empresas.user_id','=','users.id')
        ->select('informefinancieros.id','informefinancieros.nombre','informefinancieros.anio','informefinancieros.empresas_id')
        ->where ('users.id','=', Auth::id())
        ->get();

        $gr = DB::table('grupos')->orderBy('informefinancieros.id')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
        ->join ('users','empresas.user_id','=','users.id')
        ->select('grupos.id','grupos.nombre','grupos.codigo','grupos.informefinancieros_id')
        ->where ('users.id','=', Auth::id())
        ->get();

        return view('cuentas.create')
            ->with('clase',$clase)
            ->with('clas',$clas)
            ->with('cl',$cl)
            ->with('cuenta',$cuenta)
            ->with('if',$if)
            ->with('gr',$gr);
        // ->join('clases','clases.id','=','cuentas.clases_id')
        //->select('cuentas.*','clases.codigo as clcodigo')

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
    public function update(CuentaFormValidation $request, Cuenta $cuenta)
    {
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
        try {
            $cuenta->delete();
            return redirect()->route('cuentas.create',$cuenta)->with('info', 'Cuenta eliminada correctamente');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('cuentas.create',$cuenta)->with('error', 'No se pudo eliminar la cuenta porque posee dependencias');
        }

    }
}
