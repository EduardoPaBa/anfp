<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GrupoController extends Controller
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
        $inffin = DB::table('informefinancieros')->get()->pluck('id','nombre');
        $infi = DB::table('informefinancieros')->get()->pluck('id','anio');
        $ifs = DB::table('informefinancieros')->get()->pluck('id','empresas_id');
        $empre = DB::table('empresas')->get()->pluck('id','nombre');
        
        $grupo = DB::table('grupos')->get();

        return view('grupos.create')
            ->with('grupo',$grupo)
            ->with('inffin',$inffin)
            ->with('infi',$infi)
            ->with('ifs',$ifs)
            ->with('empre',$empre);



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
        DB::table('grupos')->insert([
            'codigo'=>$data['codigo'],
            'nombre'=>$data['nombre'],
            'informefinancieros_id'=>$data['bg']
            
        ]);
        $grupo = DB::table('grupos')->get();

        $inffin = DB::table('informefinancieros')->get()->pluck('id','nombre');
        $infi = DB::table('informefinancieros')->get()->pluck('id','anio');
        $ifs = DB::table('informefinancieros')->get()->pluck('id','empresas_id');
        $empre = DB::table('empresas')->get()->pluck('id','nombre');

        //dd( $request->all() );
        return view('grupos.create')
        ->with('grupo',$grupo)
        ->with('inffin',$inffin)
        ->with('infi',$infi)
        ->with('ifs',$ifs)
        ->with('empre',$empre);  


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function show(Grupo $grupo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function edit(Grupo $grupo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grupo $grupo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grupo $grupo)
    {
        //
    }
}
