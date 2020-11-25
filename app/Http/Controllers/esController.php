<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstadoDeResultadoFormValidation;
use App\Models\EstadoResultado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class esController extends Controller
{
    /*

 * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // --- EMPRESAS
        $empresas = DB::table('empresas')->orderBy('id')
            ->join('users', 'empresas.user_id', '=', 'users.id')
            ->select('empresas.id', 'empresas.nombre', 'empresas.sector')
            ->where('users.id', '=', Auth::id())
            ->get();

        // --- INFORMEFINANCIEROS
        $infin = DB::table('informefinancieros')->orderBy('id')
            ->join('empresas', 'informefinancieros.empresas_id', '=', 'empresas.id')
            ->join('users', 'empresas.user_id', '=', 'users.id')
            ->select('informefinancieros.id', 'informefinancieros.nombre', 'informefinancieros.anio', 'informefinancieros.empresas_id')
            ->where('users.id', '=', Auth::id())
            ->get();

        // --- GRUPOS
        $grupos = DB::table('grupos')->orderBy('codigo')
            ->join('informefinancieros', 'grupos.informefinancieros_id', '=', 'informefinancieros.id')
            ->join('empresas', 'informefinancieros.empresas_id', '=', 'empresas.id')
            ->join('users', 'empresas.user_id', '=', 'users.id')
            ->select('grupos.id', 'grupos.nombre', 'grupos.codigo', 'grupos.informefinancieros_id')
            ->where('users.id', '=', Auth::id())
            ->get();


        // --- CLASES
        $clases = DB::table('clases')->orderBy('codigo')
            ->join('grupos', 'clases.grupos_id', '=', 'grupos.id')
            ->join('informefinancieros', 'grupos.informefinancieros_id', '=', 'informefinancieros.id')
            ->join('empresas', 'informefinancieros.empresas_id', '=', 'empresas.id')
            ->join('users', 'empresas.user_id', '=', 'users.id')
            ->select('clases.id', 'clases.nombre', 'clases.codigo', 'clases.grupos_id')
            ->where('users.id', '=', Auth::id())
            ->get();

        // --- CUENTAS
        $cuentas = DB::table('cuentas')->orderBy('codigo')
            ->join('clases', 'cuentas.clases_id', '=', 'clases.id')
            ->join('grupos', 'clases.grupos_id', '=', 'grupos.id')
            ->join('informefinancieros', 'grupos.informefinancieros_id', '=', 'informefinancieros.id')
            ->join('empresas', 'informefinancieros.empresas_id', '=', 'empresas.id')
            ->join('users', 'empresas.user_id', '=', 'users.id')
            ->select('cuentas.id', 'cuentas.codigo', 'cuentas.nombre', 'cuentas.valor', 'cuentas.clases_id')
            ->where('users.id', '=', Auth::id())
            ->get();

        // --- SUB CUENTAS
        $subcuentas = DB::table('sub_cuentas')->orderBy('codigo')
            ->join('cuentas', 'sub_cuentas.cuentas_id', '=', 'cuentas.id')
            ->join('clases', 'cuentas.clases_id', '=', 'clases.id')
            ->join('grupos', 'clases.grupos_id', '=', 'grupos.id')
            ->join('informefinancieros', 'grupos.informefinancieros_id', '=', 'informefinancieros.id')
            ->join('empresas', 'informefinancieros.empresas_id', '=', 'empresas.id')
            ->join('users', 'empresas.user_id', '=', 'users.id')
            ->select('sub_cuentas.id', 'sub_cuentas.codigo', 'sub_cuentas.nombre', 'sub_cuentas.valor', 'sub_cuentas.cuentas_id')
            ->where('users.id', '=', Auth::id())
            ->get();


        // --- ESTADO DE RESULTADOS -------------------
        $esre = DB::table('estado_resultado')->orderBy('id')
            ->join('informefinancieros', 'estado_resultado.informefinancieros_id', '=', 'informefinancieros.id')
            ->join('empresas', 'informefinancieros.empresas_id', '=', 'empresas.id')
            ->join('users', 'empresas.user_id', '=', 'users.id')
            ->select(
                'estado_resultado.id',
                'estado_resultado.ingreso',
                'estado_resultado.costodeventa',
                'estado_resultado.gastodeoperacion',
                'estado_resultado.gastodeadministracion',
                'estado_resultado.gastodeventaymercadeo',
                'estado_resultado.gastofinancieros',
                'estado_resultado.otrosingresos',
                'estado_resultado.reservalegal',
                'estado_resultado.impuestosobrelarenta',
                'estado_resultado.informefinancieros_id'
            )
            ->where('users.id', '=', Auth::id())
            ->get();

        //RETORNANDO A LA VISTA
        return view('analisis.estadoresultados')
            ->with('clases', $clases)
            ->with('cuentas', $cuentas)
            ->with('subcuentas', $subcuentas)
            ->with('grupos', $grupos)
            ->with('infin', $infin)
            ->with('empresas', $empresas)
            ->with('esre', $esre);


    }

    public function store(EstadoDeResultadoFormValidation $request)
    {
        //
        $data = request();
        DB::table('estado_resultado')->insert([
            'ingreso' => $data['ingreso'],
            'costodeventa' => $data['costodeventa'],
            'gastodeoperacion' => $data['gastodeoperacion'],
            'gastodeadministracion' => $data['gastodeadministracion'],
            'gastodeventaymercadeo' => $data['gastodeventaymercadeo'],
            'gastofinancieros' => $data['gastofinancieros'],
            'otrosingresos' => $data['otrosingresos'],
            'reservalegal' => $data['reservalegal'],
            'impuestosobrelarenta' => $data['impuestosobrelarenta'],
            'informefinancieros_id' => $data['bg']

        ]);


        // --- EMPRESAS
        $empresas = DB::table('empresas')->orderBy('id')
            ->join('users', 'empresas.user_id', '=', 'users.id')
            ->select('empresas.id', 'empresas.nombre', 'empresas.sector')
            ->where('users.id', '=', Auth::id())
            ->get();

        // --- INFORMEFINANCIEROS
        $infin = DB::table('informefinancieros')->orderBy('id')
            ->join('empresas', 'informefinancieros.empresas_id', '=', 'empresas.id')
            ->join('users', 'empresas.user_id', '=', 'users.id')
            ->select('informefinancieros.id', 'informefinancieros.nombre', 'informefinancieros.anio', 'informefinancieros.empresas_id')
            ->where('users.id', '=', Auth::id())
            ->get();

        // --- GRUPOS
        $grupos = DB::table('grupos')->orderBy('codigo')
            ->join('informefinancieros', 'grupos.informefinancieros_id', '=', 'informefinancieros.id')
            ->join('empresas', 'informefinancieros.empresas_id', '=', 'empresas.id')
            ->join('users', 'empresas.user_id', '=', 'users.id')
            ->select('grupos.id', 'grupos.nombre', 'grupos.codigo', 'grupos.informefinancieros_id')
            ->where('users.id', '=', Auth::id())
            ->get();


        // --- CLASES
        $clases = DB::table('clases')->orderBy('codigo')
            ->join('grupos', 'clases.grupos_id', '=', 'grupos.id')
            ->join('informefinancieros', 'grupos.informefinancieros_id', '=', 'informefinancieros.id')
            ->join('empresas', 'informefinancieros.empresas_id', '=', 'empresas.id')
            ->join('users', 'empresas.user_id', '=', 'users.id')
            ->select('clases.id', 'clases.nombre', 'clases.codigo', 'clases.grupos_id')
            ->where('users.id', '=', Auth::id())
            ->get();

        // --- CUENTAS
        $cuentas = DB::table('cuentas')->orderBy('codigo')
            ->join('clases', 'cuentas.clases_id', '=', 'clases.id')
            ->join('grupos', 'clases.grupos_id', '=', 'grupos.id')
            ->join('informefinancieros', 'grupos.informefinancieros_id', '=', 'informefinancieros.id')
            ->join('empresas', 'informefinancieros.empresas_id', '=', 'empresas.id')
            ->join('users', 'empresas.user_id', '=', 'users.id')
            ->select('cuentas.id', 'cuentas.codigo', 'cuentas.nombre', 'cuentas.valor', 'cuentas.clases_id')
            ->where('users.id', '=', Auth::id())
            ->get();

        // --- SUB CUENTAS
        $subcuentas = DB::table('sub_cuentas')->orderBy('codigo')
            ->join('cuentas', 'sub_cuentas.cuentas_id', '=', 'cuentas.id')
            ->join('clases', 'cuentas.clases_id', '=', 'clases.id')
            ->join('grupos', 'clases.grupos_id', '=', 'grupos.id')
            ->join('informefinancieros', 'grupos.informefinancieros_id', '=', 'informefinancieros.id')
            ->join('empresas', 'informefinancieros.empresas_id', '=', 'empresas.id')
            ->join('users', 'empresas.user_id', '=', 'users.id')
            ->select('sub_cuentas.id', 'sub_cuentas.codigo', 'sub_cuentas.nombre', 'sub_cuentas.valor', 'sub_cuentas.cuentas_id')
            ->where('users.id', '=', Auth::id())
            ->get();

        // --- ESTADO DE RESULTADOS -------------------
        $esre = DB::table('estado_resultado')->orderBy('id')
            ->join('informefinancieros', 'estado_resultado.informefinancieros_id', '=', 'informefinancieros.id')
            ->join('empresas', 'informefinancieros.empresas_id', '=', 'empresas.id')
            ->join('users', 'empresas.user_id', '=', 'users.id')
            ->select(
                'estado_resultado.id',
                'estado_resultado.ingreso',
                'estado_resultado.costodeventa',
                'estado_resultado.gastodeoperacion',
                'estado_resultado.gastodeadministracion',
                'estado_resultado.gastodeventaymercadeo',
                'estado_resultado.gastofinancieros',
                'estado_resultado.otrosingresos',
                'estado_resultado.reservalegal',
                'estado_resultado.impuestosobrelarenta',
                'estado_resultado.informefinancieros_id'
            )
            ->where('users.id', '=', Auth::id())
            ->get();

        //RETORNANDO A LA VISTA
        return view('analisis.estadoresultados')
            ->with('clases', $clases)
            ->with('cuentas', $cuentas)
            ->with('subcuentas', $subcuentas)
            ->with('grupos', $grupos)
            ->with('infin', $infin)
            ->with('empresas', $empresas)
            ->with('esre', $esre);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Cuenta $cuenta
     * @return \Illuminate\Http\Response
     */

    public function show(EstadoResultado $esre)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Cuenta $cuenta
     * @return \Illuminate\Http\Response
     */
    public function edit(EstadoResultado $Estadoresultado)
    {

        return view('analisis.Edit_estadoresultados')
            ->with('Estadoresultado', $Estadoresultado);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Cuenta $cuenta
     * @return \Illuminate\Http\Response
     */

    public function update(EstadoDeResultadoFormValidation $request, EstadoResultado $estadoresultado)
    {
        $estadoresultado->ingreso = $request->ingreso;
        $estadoresultado->costodeventa = $request->costodeventa;
        $estadoresultado->gastodeoperacion = $request->gastodeoperacion;
        $estadoresultado->gastodeadministracion = $request->gastodeadministracion;
        $estadoresultado->gastodeventaymercadeo = $request->gastodeventaymercadeo;
        $estadoresultado->gastofinancieros = $request->gastofinancieros;
        $estadoresultado->otrosingresos = $request->otrosingresos;
        $estadoresultado->reservalegal = $request->reservalegal;
        $estadoresultado->impuestosobrelarenta = $request->impuestosobrelarenta;
        $estadoresultado->save();

        return redirect()->route('estadoresultados.index', $estadoresultado)
            ->with('estadoresultado', $estadoresultado);

    }

    public function destroy(EstadoResultado $estadoresultado)
    {
        try {
            $estadoresultado->delete();
            return redirect()->route('estadoresultados.index', $estadoresultado)
                ->with('estadoresultado', $estadoresultado)
                ->with('info', 'Estado de resultado eliminado correctamente');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('estadoresultados.index', $estadoresultado)
                ->with('estadoresultado', $estadoresultado)->with('error', 'No se pudo eliminar el estado de resultados porque posee dependencias');
        }

    }


}
