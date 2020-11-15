<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class Ratios extends Controller
{
    /*

 * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	// --- GRUPOS
        $grupos = DB::table('grupos')->orderBy('codigo')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id') 
        ->join ('users','empresas.user_id','=','users.id')
        ->select('grupos.id','grupos.nombre','grupos.codigo','grupos.informefinancieros_id')
        ->where ('users.id','=', Auth::id())
         ->get();


        // --- CLASES
        $clases = DB::table('clases')->orderBy('codigo')
        ->join ('grupos','clases.grupos_id','=', 'grupos.id')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id') 
        ->join ('users','empresas.user_id','=','users.id')
        ->select('clases.id','clases.nombre','clases.codigo','clases.grupos_id')
        ->where ('users.id','=', Auth::id())
        ->get();

        // --- ESTADO DE RESULTADOS -------------------
        $esre = DB::table('estado_resultado')->orderBy('id')
        ->join ('informefinancieros','estado_resultado.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id') 
        ->join ('users','empresas.user_id','=','users.id')
        ->select(
            'estado_resultado.*', 
            'estado_resultado.costodeventa as costov',
            'estado_resultado.ingreso as eingreso',
            'estado_resultado.gastodeoperacion as egastoO',
            'estado_resultado.gastodeadministracion as egastoA',
            'estado_resultado.gastodeventaymercadeo as egastoV',
            'estado_resultado.otrosingresos as eotrosI',
            'estado_resultado.reservalegal as ereserva',
            'estado_resultado.impuestosobrelarenta as eimpuesto'
        )
        ->where ('users.id','=', Auth::id())
        ->where('estado_resultado.id','=','1')
        ->where('informefinancieros.id','=','1')
         ->get();

         // --- ESTADO DE RESULTADOS -------------------
        $esre1 = DB::table('estado_resultado')->orderBy('id')
        ->join ('informefinancieros','estado_resultado.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
        ->join ('users','empresas.user_id','=','users.id')
        ->select(
            'estado_resultado.*', 
            'estado_resultado.costodeventa as costov',
            'estado_resultado.ingreso as eingreso',
            'estado_resultado.gastodeoperacion as egastoO',
            'estado_resultado.gastodeadministracion as egastoA',
            'estado_resultado.gastodeventaymercadeo as egastoV',
            'estado_resultado.otrosingresos as eotrosI',
            'estado_resultado.reservalegal as ereserva',
            'estado_resultado.impuestosobrelarenta as eimpuesto'
        )
        ->where ('users.id','=', Auth::id())
        ->where('estado_resultado.id','=','2')
        ->where('informefinancieros.id','=','2')
         ->get();



		// --- CUENTAS
        $cuentas = DB::table('cuentas')->orderBy('codigo')
        ->join ('clases','cuentas.clases_id','=', 'clases.id')
        ->join ('grupos','clases.grupos_id','=', 'grupos.id')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id') 
        ->join ('users','empresas.user_id','=','users.id')
        ->join ('estado_resultado','informefinancieros.id','=','estado_resultado.informefinancieros_id')
        ->select('cuentas.id','cuentas.codigo','cuentas.nombre','cuentas.valor','cuentas.clases_id')
        ->where ('users.id','=', Auth::id())
        ->where ('informefinancieros.id','=','1')
        ->where('estado_resultado.id','=','1')
        //->where ('cuentas.nombre','=','TOTAL ACTIVO')
        ->get();

        // --- CUENTAS
        $cuentas1 = DB::table('cuentas')->orderBy('codigo')
        ->join ('clases','cuentas.clases_id','=', 'clases.id')
        ->join ('grupos','clases.grupos_id','=', 'grupos.id')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id') 
        ->join ('users','empresas.user_id','=','users.id')
        ->select('cuentas.id','cuentas.codigo','cuentas.nombre','cuentas.valor','cuentas.clases_id')
        ->where ('users.id','=', Auth::id())
        ->where ('informefinancieros.id','=','2')
        //->where ('cuentas.nombre','=','TOTAL ACTIVO')
        ->get();

        // --- SUB CUENTAS
        $subcuentas = DB::table('sub_cuentas')->orderBy('codigo')
        ->join ('cuentas','sub_cuentas.cuentas_id','=', 'cuentas.id')
        ->join ('clases','cuentas.clases_id','=', 'clases.id')
        ->join ('grupos','clases.grupos_id','=', 'grupos.id')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id') 
        ->join ('users','empresas.user_id','=','users.id')
        ->select('sub_cuentas.id','sub_cuentas.codigo','sub_cuentas.nombre','sub_cuentas.valor','sub_cuentas.cuentas_id')
        ->where ('users.id','=', Auth::id())
        ->get();

        //FILTRO PARA RATIOS
        $ratios = DB::table('cuentas')->orderBy('codigo')
        ->join ('clases','cuentas.clases_id','=', 'clases.id')
        ->join ('grupos','clases.grupos_id','=', 'grupos.id')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id') 
        ->join ('users','empresas.user_id','=','users.id')
        ->select('cuentas.*','cuentas.nombre as rnombre','cuentas.valor as rcuentas', 'informefinancieros.nombre as inombre', 'grupos.nombre as gnombre')
        ->where ('users.id','=', Auth::id())
        ->where ('informefinancieros.id','=','1')
        ->where ('clases.codigo','=','1.1')
        //->where ('grupos.nombre','=','Activo')
        ->get();

        $ratios1 = DB::table('cuentas')->orderBy('codigo')
        ->join ('clases','cuentas.clases_id','=', 'clases.id')
        ->join ('grupos','clases.grupos_id','=', 'grupos.id')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id') 
        ->join ('users','empresas.user_id','=','users.id')
        ->select('cuentas.*','cuentas.nombre as rnombre','cuentas.valor as rcuentas', 'informefinancieros.nombre as inombre')
        ->where ('users.id','=', Auth::id())
        ->where ('informefinancieros.id','=','2')
        ->where ('clases.codigo','=','1.1')
        ->get();


         $ratios121 = DB::table('cuentas')->orderBy('codigo')
        ->join ('clases','cuentas.clases_id','=', 'clases.id')
        ->join ('grupos','clases.grupos_id','=', 'grupos.id')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id') 
        ->join ('users','empresas.user_id','=','users.id')
        ->select('cuentas.*','cuentas.nombre as rnombre','cuentas.valor as rcuentas', 'informefinancieros.nombre as inombre', 'grupos.nombre as gnombre')
        ->where ('users.id','=', Auth::id())
        ->where ('informefinancieros.id','=','1')
        ->where ('clases.codigo','=','1.2')
        //->where ('grupos.nombre','=','Activo')
        ->get();


         $ratios122 = DB::table('cuentas')->orderBy('codigo')
        ->join ('clases','cuentas.clases_id','=', 'clases.id')
        ->join ('grupos','clases.grupos_id','=', 'grupos.id')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id') 
        ->join ('users','empresas.user_id','=','users.id')
        ->select('cuentas.*','cuentas.nombre as rnombre','cuentas.valor as rcuentas', 'informefinancieros.nombre as inombre', 'grupos.nombre as gnombre')
        ->where ('users.id','=', Auth::id())
        ->where ('informefinancieros.id','=','1')
        ->where ('clases.codigo','=','1.1')
        //->where ('grupos.nombre','=','Activo')
        ->get();

        $ratios2 = DB::table('cuentas')->orderBy('codigo')
        ->join ('clases','cuentas.clases_id','=', 'clases.id')
        ->join ('grupos','clases.grupos_id','=', 'grupos.id')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id') 
        ->join ('users','empresas.user_id','=','users.id')
        ->select('cuentas.*','cuentas.nombre as rnombre','cuentas.valor as rcuentas', 'informefinancieros.nombre as inombre')
        ->where ('users.id','=', Auth::id())
        ->where ('informefinancieros.id','=','1')
        ->where ('cuentas.nombre','=','TOTAL ACTIVO')
        ->get();

        $ratios3 = DB::table('cuentas')->orderBy('codigo')
        ->join ('clases','cuentas.clases_id','=', 'clases.id')
        ->join ('grupos','clases.grupos_id','=', 'grupos.id')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id') 
        ->join ('users','empresas.user_id','=','users.id')
        ->select('cuentas.*','cuentas.nombre as rnombre','cuentas.valor as rcuentas', 'informefinancieros.nombre as inombre')
        ->where ('users.id','=', Auth::id())
        ->where ('informefinancieros.id','=','2')
        ->where ('cuentas.nombre','=','TOTAL ACTIVO')
        ->get();

        //RETORNANDO A LA VISTA
        return view('analisis.ratios')
            ->with('esre',$esre)
            ->with('esre1',$esre1)
            ->with('clases',$clases)
            ->with('cuentas',$cuentas)
            ->with('cuentas1',$cuentas1)
            ->with('subcuentas',$subcuentas)
            ->with('grupos',$grupos)
            ->with('ratios',$ratios)
            ->with('ratios1',$ratios1)
            ->with('ratios121',$ratios121)
            ->with('ratios122',$ratios122)
            ->with('ratios2',$ratios2)
            ->with('ratios3',$ratios3);
        
        
    }


}
