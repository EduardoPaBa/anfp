<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class ClaseController extends Controller
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
        
 $grupo = DB::table('grupos')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id') 
        ->join ('users','empresas.user_id','=','users.id')
        ->select('grupos.id','grupos.nombre','grupos.codigo','grupos.informefinancieros_id')
        ->where ('users.id','=', Auth::id())
        ->get()->pluck('id','codigo');
        
        $gru = DB::table('grupos')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id') 
        ->join ('users','empresas.user_id','=','users.id')
        ->select('grupos.id','grupos.nombre','grupos.codigo','grupos.informefinancieros_id')
        ->where ('users.id','=', Auth::id())
        ->get()->pluck('id','nombre'); 
        
        $gr = DB::table('grupos')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id') 
        ->join ('users','empresas.user_id','=','users.id')
        ->select('grupos.id','grupos.nombre','grupos.codigo','grupos.informefinancieros_id')
        ->where ('users.id','=', Auth::id())
        ->get();
        
        $clase = DB::table('clases')
        ->join ('grupos','clases.grupos_id','=', 'grupos.id')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id') 
        ->join ('users','empresas.user_id','=','users.id')
        ->select('clases.id','clases.nombre','clases.codigo','clases.grupos_id')
        ->where ('users.id','=', Auth::id())
        ->get();


        //->join('grupos','grupos.id','=','clases.grupos_id')
        //->select('clases.*','grupos.codigo as gcodigo')


        return view('clases.create')
            ->with('grupo',$grupo)
            ->with('gru',$gru)
            ->with('clase',$clase)
            ->with('gr',$gr);

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
        DB::table('clases')->insert([
            'codigo'=>$data['codigo'],
            'nombre'=>$data['nombre'],
            'grupos_id'=>$data['grupos']
            
        ]);
        //dd( $request->all() );  
        //return view('clases.create');  
        
        $grupo = DB::table('grupos')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id') 
        ->join ('users','empresas.user_id','=','users.id')
        ->select('grupos.id','grupos.nombre','grupos.codigo','grupos.informefinancieros_id')
        ->where ('users.id','=', Auth::id())
        ->get()->pluck('id','codigo');
        
        $gru = DB::table('grupos')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id') 
        ->join ('users','empresas.user_id','=','users.id')
        ->select('grupos.id','grupos.nombre','grupos.codigo','grupos.informefinancieros_id')
        ->where ('users.id','=', Auth::id())
        ->get()->pluck('id','nombre'); 
        
        $gr = DB::table('grupos')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id') 
        ->join ('users','empresas.user_id','=','users.id')
        ->select('grupos.id','grupos.nombre','grupos.codigo','grupos.informefinancieros_id')
        ->where ('users.id','=', Auth::id())
        ->get();
        
        $clase = DB::table('clases')
        ->join ('grupos','clases.grupos_id','=', 'grupos.id')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id') 
        ->join ('users','empresas.user_id','=','users.id')
        ->select('clases.id','clases.nombre','clases.codigo','clases.grupos_id')
        ->where ('users.id','=', Auth::id())
        ->get();


        return view('clases.create')
            ->with('grupo',$grupo)
            ->with('gru',$gru)
            ->with('clase',$clase)
            ->with('gr',$gr);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clase  $clase
     * @return \Illuminate\Http\Response
     */
    public function show(Clase $clase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clase  $clase
     * @return \Illuminate\Http\Response
     */
    public function edit(Clase $clase)
    {
        return view('clases.edit')
            ->with('clase',$clase);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clase  $clase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clase $clase)
    {
        //
        $request->validate([
            'nombre' => 'required',
            'codigo' => 'required',
        ]);

        $clase->codigo = $request->codigo;
        $clase->nombre = $request->nombre;

        $clase->save();

        return redirect()->route('clases.create',$clase);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clase  $clase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clase $clase)
    {
        //
        $clase->delete();

        return redirect()->route('clases.create',$clase);
    }
}
