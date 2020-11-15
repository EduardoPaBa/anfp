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

		// --- CUENTAS
        $cuentas = DB::table('cuentas')->orderBy('codigo')
        ->join ('clases','cuentas.clases_id','=', 'clases.id')
        ->join ('grupos','clases.grupos_id','=', 'grupos.id')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id') 
        ->join ('users','empresas.user_id','=','users.id')
        ->select('cuentas.id','cuentas.codigo','cuentas.nombre','cuentas.valor','cuentas.clases_id')
        ->where ('users.id','=', Auth::id())
        ->where ('informefinancieros.id','=','1')
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
        ->select('cuentas.*','cuentas.nombre as rnombre','cuentas.valor as rcuentas', 'informefinancieros.nombre as inombre')
        ->where ('users.id','=', Auth::id())
        ->where ('informefinancieros.id','=','1')
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
        //->where ('cuentas.nombre','=','TOTAL ACTIVO')
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
            ->with('clases',$clases)
            ->with('cuentas',$cuentas)
            ->with('cuentas1',$cuentas1)
            ->with('subcuentas',$subcuentas)
            ->with('grupos',$grupos)
            ->with('ratios',$ratios)
            ->with('ratios1',$ratios1)
            ->with('ratios2',$ratios2)
            ->with('ratios3',$ratios3);
        
        
    }


}
