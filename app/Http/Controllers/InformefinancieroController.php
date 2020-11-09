<?php

namespace App\Http\Controllers;

use App\Models\informefinanciero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InformefinancieroController extends Controller
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
        $empresa = DB::table('empresas')->get()->pluck('id','nombre');
        $emp = DB::table('empresas')->get()->pluck('id','sector');
        return view('informesfinancieros.create')
            ->with('empresa',$empresa)
            ->with('emp',$emp);
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
        DB::table('informefinancieros')->insert([
            
            'nombre'=>$data['nombre'],
            'anio'=>$data['anio'],
            'empresas_id'=>$data['empresas']
        ]);



        $empresa = DB::table('empresas')->get()->pluck('id','nombre');
        $emp = DB::table('empresas')->get()->pluck('id','sector');
        return view('informesfinancieros.create')
            ->with('empresa',$empresa)
            ->with('emp',$emp);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\informefinanciero  $informefinanciero
     * @return \Illuminate\Http\Response
     */
    public function show(informefinanciero $informefinanciero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\informefinanciero  $informefinanciero
     * @return \Illuminate\Http\Response
     */
    public function edit(informefinanciero $informefinanciero)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\informefinanciero  $informefinanciero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, informefinanciero $informefinanciero)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\informefinanciero  $informefinanciero
     * @return \Illuminate\Http\Response
     */
    public function destroy(informefinanciero $informefinanciero)
    {
        //
    }
}
