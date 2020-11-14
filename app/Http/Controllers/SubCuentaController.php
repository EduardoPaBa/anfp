<?php

namespace App\Http\Controllers;

use App\Models\SubCuenta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class SubCuentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('sub_cuentas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //DB::table('cuentas')->get()->pluck('codigo','nombre')->dd();
        
        $cuenta = DB::table('cuentas')
        ->join ('clases','cuentas.clases_id','=', 'clases.id')
        ->join ('grupos','clases.grupos_id','=', 'grupos.id')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id') 
        ->join ('users','empresas.user_id','=','users.id')
        ->select('cuentas.id','cuentas.codigo','cuentas.nombre','cuentas.valor','cuentas.clases_id')
        ->where ('users.id','=', Auth::id())
        ->get()->pluck('id','codigo');
        
        $cue = DB::table('cuentas')
        ->join ('clases','cuentas.clases_id','=', 'clases.id')
        ->join ('grupos','clases.grupos_id','=', 'grupos.id')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id') 
        ->join ('users','empresas.user_id','=','users.id')
        ->select('cuentas.id','cuentas.codigo','cuentas.nombre','cuentas.valor','cuentas.clases_id')
        ->where ('users.id','=', Auth::id())
        ->get()->pluck('id','nombre');

        $cuenhumilde = DB::table('cuentas')
        ->join ('clases','cuentas.clases_id','=', 'clases.id')
        ->join ('grupos','clases.grupos_id','=', 'grupos.id')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id') 
        ->join ('users','empresas.user_id','=','users.id')
        ->select('cuentas.id','cuentas.codigo','cuentas.nombre','cuentas.valor','cuentas.clases_id')
        ->where ('users.id','=', Auth::id())
        ->get();

        $subcu = DB::table('sub_cuentas')->orderBy('codigo')
        ->join ('cuentas','sub_cuentas.cuentas_id','=', 'cuentas.id')
        ->join ('clases','cuentas.clases_id','=', 'clases.id')
        ->join ('grupos','clases.grupos_id','=', 'grupos.id')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id') 
        ->join ('users','empresas.user_id','=','users.id')
        ->select('sub_cuentas.id','sub_cuentas.codigo','sub_cuentas.nombre','sub_cuentas.valor','sub_cuentas.cuentas_id')
        ->where ('users.id','=', Auth::id())
        ->get();


        $cl = DB::table('clases')
        ->join ('grupos','clases.grupos_id','=', 'grupos.id')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id') 
        ->join ('users','empresas.user_id','=','users.id')
        ->select('clases.id','clases.nombre','clases.codigo','clases.grupos_id')
        ->where ('users.id','=', Auth::id())
        ->get();
        
        $cu = DB::table('cuentas')->orderBy('codigo')
        ->join ('clases','cuentas.clases_id','=', 'clases.id')
        ->join ('grupos','clases.grupos_id','=', 'grupos.id')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id') 
        ->join ('users','empresas.user_id','=','users.id')
        ->select('cuentas.id','cuentas.codigo','cuentas.nombre','cuentas.valor','cuentas.clases_id')
        ->where ('users.id','=', Auth::id())
        ->get();

        $if = DB::table('informefinancieros')->orderBy('id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id') 
        ->join ('users','empresas.user_id','=','users.id')
        ->select('informefinancieros.id','informefinancieros.nombre','informefinancieros.anio','informefinancieros.empresas_id')
        ->where ('users.id','=', Auth::id())
        ->get();
        
        $gr = DB::table('grupos')->orderBy('informefinancieros.id')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id') 
        ->join ('users','empresas.user_id','=','users.id')
        ->select('grupos.id','grupos.nombre','grupos.codigo','grupos.informefinancieros_id')
        ->where ('users.id','=', Auth::id())
        ->get();

        
       

        return view('subcuentas.create')
            ->with('cuenta',$cuenta)
            ->with('cue',$cue)
            ->with('subcu',$subcu)
            ->with('cuenhumilde',$cuenhumilde)
            ->with('cl',$cl)
            ->with('cu',$cu)
            ->with('if',$if)
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
        DB::table('sub_cuentas')->insert([
            'codigo'=>$data['codigo'],
            'nombre'=>$data['nombre'],
            'valor'=>$data['valor'],
            'cuentas_id'=>$data['cuentas']
        ]);
        
        
        //REDIRECCIONANDO
 $cuenta = DB::table('cuentas')
        ->join ('clases','cuentas.clases_id','=', 'clases.id')
        ->join ('grupos','clases.grupos_id','=', 'grupos.id')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id') 
        ->join ('users','empresas.user_id','=','users.id')
        ->select('cuentas.id','cuentas.codigo','cuentas.nombre','cuentas.valor','cuentas.clases_id')
        ->where ('users.id','=', Auth::id())
        ->get()->pluck('id','codigo');
        
        $cue = DB::table('cuentas')
        ->join ('clases','cuentas.clases_id','=', 'clases.id')
        ->join ('grupos','clases.grupos_id','=', 'grupos.id')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id') 
        ->join ('users','empresas.user_id','=','users.id')
        ->select('cuentas.id','cuentas.codigo','cuentas.nombre','cuentas.valor','cuentas.clases_id')
        ->where ('users.id','=', Auth::id())
        ->get()->pluck('id','nombre');

        $cuenhumilde = DB::table('cuentas')
        ->join ('clases','cuentas.clases_id','=', 'clases.id')
        ->join ('grupos','clases.grupos_id','=', 'grupos.id')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id') 
        ->join ('users','empresas.user_id','=','users.id')
        ->select('cuentas.id','cuentas.codigo','cuentas.nombre','cuentas.valor','cuentas.clases_id')
        ->where ('users.id','=', Auth::id())
        ->get();

        $subcu = DB::table('sub_cuentas')->orderBy('codigo')
        ->join ('cuentas','sub_cuentas.cuentas_id','=', 'cuentas.id')
        ->join ('clases','cuentas.clases_id','=', 'clases.id')
        ->join ('grupos','clases.grupos_id','=', 'grupos.id')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id') 
        ->join ('users','empresas.user_id','=','users.id')
        ->select('sub_cuentas.id','sub_cuentas.codigo','sub_cuentas.nombre','sub_cuentas.valor','sub_cuentas.cuentas_id')
        ->where ('users.id','=', Auth::id())
        ->get();

        $cl = DB::table('clases')
        ->join ('grupos','clases.grupos_id','=', 'grupos.id')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id') 
        ->join ('users','empresas.user_id','=','users.id')
        ->select('clases.id','clases.nombre','clases.codigo','clases.grupos_id')
        ->where ('users.id','=', Auth::id())
        ->get();
        
        $cu = DB::table('cuentas')->orderBy('codigo')
        ->join ('clases','cuentas.clases_id','=', 'clases.id')
        ->join ('grupos','clases.grupos_id','=', 'grupos.id')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id') 
        ->join ('users','empresas.user_id','=','users.id')
        ->select('cuentas.id','cuentas.codigo','cuentas.nombre','cuentas.valor','cuentas.clases_id')
        ->where ('users.id','=', Auth::id())
        ->get();

        $if = DB::table('informefinancieros')->orderBy('id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id') 
        ->join ('users','empresas.user_id','=','users.id')
        ->select('informefinancieros.id','informefinancieros.nombre','informefinancieros.anio','informefinancieros.empresas_id')
        ->where ('users.id','=', Auth::id())
        ->get();
        
        $gr = DB::table('grupos')->orderBy('informefinancieros.id')
        ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
        ->join ('empresas','informefinancieros.empresas_id','=','empresas.id') 
        ->join ('users','empresas.user_id','=','users.id')
        ->select('grupos.id','grupos.nombre','grupos.codigo','grupos.informefinancieros_id')
        ->where ('users.id','=', Auth::id())
        ->get();

        
       

        return view('subcuentas.create')
            ->with('cuenta',$cuenta)
            ->with('cue',$cue)
            ->with('subcu',$subcu)
            ->with('cuenhumilde',$cuenhumilde)
            ->with('cl',$cl)
            ->with('cu',$cu)
            ->with('if',$if)
            ->with('gr',$gr);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCuenta  $subCuenta
     * @return \Illuminate\Http\Response
     */
    public function show(SubCuenta $subCuenta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCuenta  $subCuenta
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCuenta $subCuenta)
    {
        //
        return view('subcuentas.edit')
            ->with('subCuenta',$subCuenta);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCuenta  $subCuenta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCuenta $subCuenta)
    {
        //
        $request->validate([
            'codigo' => 'required',
            'nombre' => 'required',
            'valor' => 'required',
        ]);

        $subCuenta->codigo = $request->codigo;
        $subCuenta->nombre = $request->nombre;
        $subCuenta->valor = $request->valor;

        $subCuenta->save();

        return redirect()->route('sub_cuentas.create',$subCuenta);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCuenta  $subCuenta
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCuenta $subCuenta)
    {
        //
        $subCuenta->delete();

        return redirect()->route('sub_cuentas.create',$subCuenta);
    }
}
