<?php

namespace App\Http\Controllers;

use App\Http\Requests\InformeFinancieroValidation;
use App\Models\informefinanciero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

        $if = DB::table('informefinancieros')->orderBy('id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
        ->join ('users','empresas.user_id','=','users.id')
        ->select('informefinancieros.id','informefinancieros.nombre','informefinancieros.anio','informefinancieros.empresas_id')
        ->where ('users.id','=', Auth::id())
        ->get();

        $e = DB::table('empresas')

        ->get();

        $empresa = DB::table('empresas')
        ->join ('users','empresas.user_id','=','users.id')
        ->where ('users.id','=', Auth::id())
        ->select('empresas.id','empresas.nombre','empresas.sector','empresas.user_id')
        ->get()->pluck('id','nombre');

        $emp = DB::table('empresas')
        ->join ('users','empresas.user_id','=','users.id')
        ->where ('users.id','=', Auth::id())
        ->select('empresas.id','empresas.nombre','empresas.sector','empresas.user_id')
        ->get();

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
    public function store(InformeFinancieroValidation $request)
    {
        //
        $data=request();
        DB::table('informefinancieros')->insert([

            'nombre'=>$data['nombre'],
            'anio'=>$data['anio'],
            'empresas_id'=>$data['empresas']
        ]);


        //$if = DB::table('informefinancieros')->get();

        $if = DB::table('informefinancieros')->orderBy('id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
        ->join ('users','empresas.user_id','=','users.id')
        ->select('informefinancieros.id','informefinancieros.nombre','informefinancieros.anio','informefinancieros.empresas_id')
        ->where ('users.id','=', Auth::id())
        ->get();

        $e = DB::table('empresas')->get();
        $empresa = DB::table('empresas')
        ->join ('users','empresas.user_id','=','users.id')
        ->where ('users.id','=', Auth::id())
        ->select('empresas.id','empresas.nombre','empresas.sector','empresas.user_id')
        ->get()->pluck('id','nombre');
        $emp = DB::table('empresas')
        ->join ('users','empresas.user_id','=','users.id')
        ->where ('users.id','=', Auth::id())
        ->get();
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
    public function update(InformeFinancieroValidation $request, informefinanciero $informefinanciero)
    {
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
        try {
            $informefinanciero->delete();
            return redirect()->route('informefinancieros.create', $informefinanciero)->with('info', 'Balance General eliminado correctamente');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('informefinancieros.create', $informefinanciero)->with('error', 'No se pudo eliminar el balance general porque posee dependencias');
        }
    }
}
