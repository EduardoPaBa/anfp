<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class prueba extends Controller
{
    /*

 * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	// --- GRUPOS
        $grupos = DB::table('grupos')->get();

        // --- CLASES
        $clases = DB::table('clases')->get();

		// --- CUENTAS
        $cuentas = DB::table('cuentas')->get();

        // --- SUB CUENTAS
        $subcuentas = DB::table('sub_cuentas')->get();

        //RETORNANDO A LA VISTA
        return view('analisis.balancegeneral')
            ->with('clases',$clases)
            ->with('cuentas',$cuentas)
            ->with('subcuentas',$subcuentas)
            ->with('grupos',$grupos);
        
        
    }


}
