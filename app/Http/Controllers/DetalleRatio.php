<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class DetalleRatio extends Controller
{
    /*

 * @return \Illuminate\Http\Response
     */
    public function index()
    {


        
    	$informe = DB::table('informefinancieros')->orderBy('nombre')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
        ->join ('users','empresas.user_id','=','users.id')
        ->select('informefinancieros.id','informefinancieros.nombre','informefinancieros.anio','informefinancieros.empresas_id')
        ->where ('users.id','=', Auth::id())
         ->get();

    	return view('analisis.detalleratio')
    			->with('informe',$informe);
    }

}