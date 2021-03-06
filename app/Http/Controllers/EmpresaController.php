<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpresaFormValidation;
use App\Models\empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Exception;

class EmpresaController extends Controller
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
        $empresa = DB::table('empresas')->orderBy('id')
        ->join ('users','empresas.user_id','=','users.id')
        ->where ('users.id','=', Auth::id())
        ->select('empresas.id','empresas.nombre','empresas.sector','empresas.user_id')
        ->get();
        return view('empresas.create')->with('empresa',$empresa);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresaFormValidation $request)
    {
        //
        $data=request();
        DB::table('empresas')->insert([
            'nombre'=>$data['nombre'],
            'sector'=>$data['sector'],
            'user_id'=>Auth::id()

        ]);

        $empresa = DB::table('empresas')->orderBy('id')
        ->join ('users','empresas.user_id','=','users.id')
        ->where ('users.id','=', Auth::id())
        ->select('empresas.id','empresas.nombre','empresas.sector','empresas.user_id')
        ->get();

        return view('empresas.create')
            ->with('empresa',$empresa);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(empresa $empresa)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(empresa $empresa)
    {
        //
        return view('empresas.edit')->with('empresa',$empresa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(EmpresaFormValidation $request, empresa $empresa)
    {
        $empresa->nombre = $request->nombre;
        $empresa->sector = $request->sector;

        $empresa->save();

        //$grupo = Grupo::find($id)->update($request->all());
        return redirect()->route('empresas.create', $empresa);
        //return $empresa;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(empresa $empresa)
    {
        try {
            $empresa->delete();
            return redirect()->route('empresas.create', $empresa)->with('info', 'Empresa eliminada correctamente');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('empresas.create', $empresa)->with('error', 'No se pudo eliminar la empresa porque posee dependencias');
        }
    }
}
