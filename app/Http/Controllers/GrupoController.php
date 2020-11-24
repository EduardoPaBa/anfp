<?php

namespace App\Http\Controllers;

use App\Http\Requests\GrupoFormValidation;
use App\Models\Grupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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

         $inffin = DB::table('informefinancieros')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
        ->join ('users','empresas.user_id','=','users.id')
        ->select('informefinancieros.id','informefinancieros.nombre','informefinancieros.anio','informefinancieros.empresas_id')
        ->where ('users.id','=', Auth::id())
        ->get()->pluck('id','nombre');

        $infi = DB::table('informefinancieros')
         ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
        ->join ('users','empresas.user_id','=','users.id')
        ->select('informefinancieros.id','informefinancieros.nombre','informefinancieros.anio','informefinancieros.empresas_id')
        ->where ('users.id','=', Auth::id())
        ->get()->pluck('id','anio');

        $ifs = DB::table('informefinancieros')
         ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
        ->join ('users','empresas.user_id','=','users.id')
        ->select('informefinancieros.id','informefinancieros.nombre','informefinancieros.anio','informefinancieros.empresas_id')
        ->where ('users.id','=', Auth::id())
        ->get();

        $empre = DB::table('empresas')
        ->get()->pluck('id','nombre');

        $grupo = DB::table('grupos')->orderBy('codigo')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
        ->join ('users','empresas.user_id','=','users.id')
        ->select('grupos.id','grupos.nombre','grupos.codigo','grupos.informefinancieros_id')
        ->where ('users.id','=', Auth::id())
         ->get();


        return view('grupos.create')
            ->with('grupo',$grupo)
            ->with('inffin',$inffin)
            ->with('infi',$infi)
            ->with('ifs',$ifs)
            ->with('empre',$empre);
            //          ->join('informefinancieros','informefinancieros.id','=','grupos.informefinancieros_id')
            //->select('grupos.*','informefinancieros.nombre as inombre')
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GrupoFormValidation $request)
    {
        //
          $data=request();
        DB::table('grupos')->insert([
            'codigo'=>$data['codigo'],
            'nombre'=>$data['nombre'],
            'informefinancieros_id'=>$data['bg']

        ]);
        //$grupo = DB::table('grupos')->get();

        $inffin = DB::table('informefinancieros')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
        ->join ('users','empresas.user_id','=','users.id')
        ->select('informefinancieros.id','informefinancieros.nombre','informefinancieros.anio','informefinancieros.empresas_id')
        ->where ('users.id','=', Auth::id())
        ->get()->pluck('id','nombre');

        $infi = DB::table('informefinancieros')
         ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
        ->join ('users','empresas.user_id','=','users.id')
        ->select('informefinancieros.id','informefinancieros.nombre','informefinancieros.anio','informefinancieros.empresas_id')
        ->where ('users.id','=', Auth::id())
        ->get()->pluck('id','anio');

        $ifs = DB::table('informefinancieros')
         ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
        ->join ('users','empresas.user_id','=','users.id')
        ->select('informefinancieros.id','informefinancieros.nombre','informefinancieros.anio','informefinancieros.empresas_id')
        ->where ('users.id','=', Auth::id())
        ->get();

        $empre = DB::table('empresas')
        ->get()->pluck('id','nombre');

        $grupo = DB::table('grupos')->orderBy('codigo')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
        ->join ('users','empresas.user_id','=','users.id')
        ->select('grupos.id','grupos.nombre','grupos.codigo','grupos.informefinancieros_id')
        ->where ('users.id','=', Auth::id())
         ->get();


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
        $grupo = Grupo::findOrFail($id);
        return view('grupos.show', compact('grupo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function edit(Grupo $grupo)
    {
        //$grupo = DB::table('grupos')->get();
        //$grupo = Grupo::findOrFail($id);
        return view('grupos.edit')
                ->with('grupo', $grupo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */


     public function update(GrupoFormValidation $request, Grupo $grupo) {
        $grupo->codigo = $request->codigo;
        $grupo->nombre = $request->nombre;
        //$grupo->informefinancieros_id = $request->informefinancieros_id;
        $grupo->save();
        //$grupo = Grupo::find($id)->update($request->all());
        return redirect()->route('grupos.create', $grupo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grupo $grupo)
    {
        $grupo->delete();

        return redirect()->route('grupos.create');

    }
}
