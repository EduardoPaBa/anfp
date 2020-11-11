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
        //$if = DB::table('informefinancieros')->get();
        $e = DB::table('empresas')->get();
        $if = DB::table('informefinancieros')
          ->join('empresas','empresas.id','=','informefinancieros.empresas_id')
          ->select('informefinancieros.*','empresas.nombre as enombre')
          ->get();
        $empresa = DB::table('empresas')->get()->pluck('id','nombre');
        $emp = DB::table('empresas')->get()->pluck('id','sector');
        return view('informesfinancieros.create')
        ->with('if',$if)
            ->with('e',$e)
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


        //$if = DB::table('informefinancieros')->get();
        $e = DB::table('empresas')->get();
        $if = DB::table('informefinancieros')
          ->join('empresas','empresas.id','=','informefinancieros.empresas_id')
          ->select('informefinancieros.*','empresas.nombre as enombre')
          ->get();
        $empresa = DB::table('empresas')->get()->pluck('id','nombre');
        $emp = DB::table('empresas')->get()->pluck('id','sector');
        return view('informesfinancieros.create')
            ->with('if',$if)
            ->with('e',$e) 
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
        return view('informesfinancieros.edit')
            ->with('informefinanciero',$informefinanciero);
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
        $request->validate([
            'nombre' => 'required',
            'anio' => 'required',
        ]);

        $informefinanciero->nombre = $request->nombre;
        $informefinanciero->anio = $request->anio;

        $informefinanciero->save();


        return redirect()->route('informefinancieros.create',$informefinanciero);
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
        $informefinanciero->delete();

        return redirect()->route('informefinancieros.create',$informefinanciero);
    }
}
