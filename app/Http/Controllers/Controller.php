<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function imprimir(){
    	



    	set_time_limit(300);
    	//$pdf = \PDF::loadView('analisis.detalleConclusion');
    	$pdf = \PDF::loadView('analisis.balancegeneral');
    	//$pdf = \PDF::loadView('ejemplo');
     	return $pdf->download('ejemplo.pdf');
    
	}
}
