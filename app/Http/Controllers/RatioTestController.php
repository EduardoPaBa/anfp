<?php

namespace App\Http\Controllers;

use App\Http\Requests\DetalleRatioFormValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RatioTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        dd($request);
//        $x = $request->input("informe1");
//        $y = $request->input("informe2");
//        $bg1=$x;
//        $bg2=$y;
//
//// --- EMPRESAS
//        $empresas = DB::table('empresas')->orderBy('id')
//            ->join ('users','empresas.user_id','=','users.id')
//            ->select('empresas.id','empresas.nombre','empresas.sector')
//            ->where ('users.id','=', Auth::id())
//            ->get();
//
//        // --- INFORMEFINANCIEROS
//        $infin = DB::table('informefinancieros')->orderBy('nombre')
//            ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
//            ->join ('users','empresas.user_id','=','users.id')
//            ->select('informefinancieros.id','informefinancieros.nombre','informefinancieros.anio','informefinancieros.empresas_id')
//            ->where ('users.id','=', Auth::id())
//            ->get();
//
//        // --- GRUPOS
//        $grupos = DB::table('grupos')->orderBy('codigo')
//            ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
//            ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
//            ->join ('users','empresas.user_id','=','users.id')
//            ->select('grupos.id','grupos.nombre','grupos.codigo','grupos.informefinancieros_id')
//            ->where ('users.id','=', Auth::id())
//            ->get();
//
//
//        // --- CLASES
//        $clases = DB::table('clases')->orderBy('codigo')
//            ->join ('grupos','clases.grupos_id','=', 'grupos.id')
//            ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
//            ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
//            ->join ('users','empresas.user_id','=','users.id')
//            ->select('clases.id','clases.nombre','clases.codigo','clases.grupos_id')
//            ->where ('users.id','=', Auth::id())
//            ->get();
//
//        // --- ESTADO DE RESULTADOS -------------------
//        $esre = DB::table('estado_resultado')->orderBy('id')
//            ->join ('informefinancieros','estado_resultado.informefinancieros_id','=', 'informefinancieros.id')
//            ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
//            ->join ('users','empresas.user_id','=','users.id')
//            ->select(
//                'estado_resultado.*',
//                'estado_resultado.costodeventa as costov',
//                'estado_resultado.ingreso as eingreso',
//                'estado_resultado.gastodeoperacion as egastoO',
//                'estado_resultado.gastofinancieros as egastoF',
//                'estado_resultado.gastodeadministracion as egastoA',
//                'estado_resultado.gastodeventaymercadeo as egastoV',
//                'estado_resultado.otrosingresos as eotrosI',
//                'estado_resultado.reservalegal as ereserva',
//                'estado_resultado.impuestosobrelarenta as eimpuesto'
//            )
//            ->where ('users.id','=', Auth::id())
//            ->where('estado_resultado.informefinancieros_id','=',$x)
//            ->where('informefinancieros.id','=',$x)
//            ->get();
//
//        // --- ESTADO DE RESULTADOS -------------------
//        $esre1 = DB::table('estado_resultado')->orderBy('id')
//            ->join ('informefinancieros','estado_resultado.informefinancieros_id','=', 'informefinancieros.id')
//            ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
//            ->join ('users','empresas.user_id','=','users.id')
//            ->select(
//                'estado_resultado.*',
//                'estado_resultado.costodeventa as costov',
//                'estado_resultado.ingreso as eingreso',
//                'estado_resultado.gastodeoperacion as egastoO',
//                'estado_resultado.gastofinancieros as egastoF',
//                'estado_resultado.gastodeadministracion as egastoA',
//                'estado_resultado.gastodeventaymercadeo as egastoV',
//                'estado_resultado.otrosingresos as eotrosI',
//                'estado_resultado.reservalegal as ereserva',
//                'estado_resultado.impuestosobrelarenta as eimpuesto'
//            )
//            ->where ('users.id','=', Auth::id())
//            ->where('estado_resultado.informefinancieros_id','=',$y)
//            ->where('informefinancieros.id','=',$y)
//            ->get();
//
//
//
//        // --- CUENTAS
//        $cuentas = DB::table('cuentas')->orderBy('codigo')
//            ->join ('clases','cuentas.clases_id','=', 'clases.id')
//            ->join ('grupos','clases.grupos_id','=', 'grupos.id')
//            ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
//            ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
//            ->join ('users','empresas.user_id','=','users.id')
//            ->join ('estado_resultado','informefinancieros.id','=','estado_resultado.informefinancieros_id')
//            ->select('cuentas.id','cuentas.codigo','cuentas.nombre','cuentas.valor','cuentas.clases_id')
//            ->where ('users.id','=', Auth::id())
//            ->where ('informefinancieros.id','=',$x)
//            //->where('estado_resultado.id','=','1')
//            //->where ('cuentas.nombre','=','TOTAL ACTIVO')
//            ->get();
//
//        // --- CUENTAS
//        $cuentas1 = DB::table('cuentas')->orderBy('codigo')
//            ->join ('clases','cuentas.clases_id','=', 'clases.id')
//            ->join ('grupos','clases.grupos_id','=', 'grupos.id')
//            ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
//            ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
//            ->join ('users','empresas.user_id','=','users.id')
//            ->select('cuentas.id','cuentas.codigo','cuentas.nombre','cuentas.valor','cuentas.clases_id')
//            ->where ('users.id','=', Auth::id())
//            ->where ('informefinancieros.id','=',$y)
//            //->where ('cuentas.nombre','=','TOTAL ACTIVO')
//            ->get();
//            // --- CUENTAS
//        $cuentasss1 = DB::table('cuentas')->orderBy('codigo')
//            ->join ('clases','cuentas.clases_id','=', 'clases.id')
//            ->join ('grupos','clases.grupos_id','=', 'grupos.id')
//            ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
//            ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
//            ->join ('users','empresas.user_id','=','users.id')
//            ->select('cuentas.id','cuentas.codigo','cuentas.nombre','cuentas.valor','cuentas.clases_id')
//            ->where ('users.id','=', Auth::id())
//            //->where ('informefinancieros.id','=',$y)
//            //->where ('cuentas.nombre','=','TOTAL ACTIVO')
//            ->get();
//
//        // --- SUB CUENTAS
//        $subcuentas = DB::table('sub_cuentas')->orderBy('codigo')
//            ->join ('cuentas','sub_cuentas.cuentas_id','=', 'cuentas.id')
//            ->join ('clases','cuentas.clases_id','=', 'clases.id')
//            ->join ('grupos','clases.grupos_id','=', 'grupos.id')
//            ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
//            ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
//            ->join ('users','empresas.user_id','=','users.id')
//            ->select('sub_cuentas.id','sub_cuentas.codigo','sub_cuentas.nombre','sub_cuentas.valor','sub_cuentas.cuentas_id')
//            ->where ('users.id','=', Auth::id())
//            ->get();
//
//        //FILTRO PARA RATIOS
//        $ratios = DB::table('cuentas')->orderBy('codigo')
//            ->join ('clases','cuentas.clases_id','=', 'clases.id')
//            ->join ('grupos','clases.grupos_id','=', 'grupos.id')
//            ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
//            ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
//            ->join ('users','empresas.user_id','=','users.id')
//            ->select('cuentas.*','cuentas.nombre as rnombre','cuentas.valor as rcuentas', 'informefinancieros.nombre as inombre', 'grupos.nombre as gnombre')
//            ->where ('users.id','=', Auth::id())
//            ->where ('informefinancieros.id','=',$x)
//            ->where ('cuentas.codigo','=','1.1')
//            //->where ('grupos.nombre','=','Activo')
//            ->get();
//
//        $ratios1 = DB::table('cuentas')->orderBy('codigo')
//            ->join ('clases','cuentas.clases_id','=', 'clases.id')
//            ->join ('grupos','clases.grupos_id','=', 'grupos.id')
//            ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
//            ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
//            ->join ('users','empresas.user_id','=','users.id')
//            ->select('cuentas.*','cuentas.nombre as rnombre','cuentas.valor as rcuentas', 'informefinancieros.nombre as inombre')
//            ->where ('users.id','=', Auth::id())
//            ->where ('informefinancieros.id','=',$y)
//            ->where ('cuentas.codigo','=','1.1')
//            ->get();
//
//
//        $ratios121 = DB::table('cuentas')->orderBy('codigo')
//            ->join ('clases','cuentas.clases_id','=', 'clases.id')
//            ->join ('grupos','clases.grupos_id','=', 'grupos.id')
//            ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
//            ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
//            ->join ('users','empresas.user_id','=','users.id')
//            ->select('cuentas.*','cuentas.nombre as rnombre','cuentas.valor as rcuentas', 'informefinancieros.nombre as inombre', 'grupos.nombre as gnombre')
//            ->where ('users.id','=', Auth::id())
//            ->where ('informefinancieros.id','=',$x)
//            ->where ('cuentas.codigo','=','1.2')
//            //->where ('grupos.nombre','=','Activo')
//            ->get();
//
//
//        $ratios122 = DB::table('cuentas')->orderBy('codigo')
//            ->join ('clases','cuentas.clases_id','=', 'clases.id')
//            ->join ('grupos','clases.grupos_id','=', 'grupos.id')
//            ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
//            ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
//            ->join ('users','empresas.user_id','=','users.id')
//            ->select('cuentas.*','cuentas.nombre as rnombre','cuentas.valor as rcuentas', 'informefinancieros.nombre as inombre', 'grupos.nombre as gnombre')
//            ->where ('users.id','=', Auth::id())
//            ->where ('informefinancieros.id','=',$y)
//            ->where ('cuentas.codigo','=','1.2')
//            //->where ('grupos.nombre','=','Activo')
//            ->get();
//
//        $ratios2 = DB::table('cuentas')->orderBy('codigo')
//            ->join ('clases','cuentas.clases_id','=', 'clases.id')
//            ->join ('grupos','clases.grupos_id','=', 'grupos.id')
//            ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
//            ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
//            ->join ('users','empresas.user_id','=','users.id')
//            ->select('cuentas.*','cuentas.nombre as rnombre','cuentas.valor as rcuentas', 'informefinancieros.nombre as inombre')
//            ->where ('users.id','=', Auth::id())
//            ->where ('informefinancieros.id','=',$x)
//            ->where ('cuentas.nombre','=','TOTAL ACTIVO')
//            ->get();
//
//        $ratios3 = DB::table('cuentas')->orderBy('codigo')
//            ->join ('clases','cuentas.clases_id','=', 'clases.id')
//            ->join ('grupos','clases.grupos_id','=', 'grupos.id')
//            ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
//            ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
//            ->join ('users','empresas.user_id','=','users.id')
//            ->select('cuentas.*','cuentas.nombre as rnombre','cuentas.valor as rcuentas', 'informefinancieros.nombre as inombre')
//            ->where ('users.id','=', Auth::id())
//            ->where ('informefinancieros.id','=',$y)
//            ->where ('cuentas.nombre','=','TOTAL ACTIVO')
//            ->get();
//
//
//        $informe = DB::table('informefinancieros')->orderBy('nombre')
//            ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
//            ->join ('users','empresas.user_id','=','users.id')
//            ->select('informefinancieros.id','informefinancieros.nombre','informefinancieros.anio','informefinancieros.empresas_id')
//            ->where ('users.id','=', Auth::id())
//            ->get();
//
//        //RETORNANDO A LA VISTA
//        return view('analisis.ratios')
//            ->with('esre',$esre)
//            ->with('esre1',$esre1)
//            ->with('clases',$clases)
//            ->with('cuentas',$cuentas)
//            ->with('cuentas1',$cuentas1)
//            ->with('subcuentas',$subcuentas)
//            ->with('grupos',$grupos)
//            ->with('empresas',$empresas)
//            ->with('infin',$infin)
//            ->with('ratios',$ratios)
//            ->with('ratios1',$ratios1)
//            ->with('ratios121',$ratios121)
//            ->with('ratios122',$ratios122)
//            ->with('ratios2',$ratios2)
//            ->with('ratios3',$ratios3)
//            ->with('informe',$informe)
//            ->with('bg1',$bg1)
//            ->with('bg2',$bg2)
//            ->with('cuentasss1',$cuentasss1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(DetalleRatioFormValidation $request)
    {
        //dd($request);

        //$input = Input::all();
        $x = $request->input("informe1");
        $y = $request->input("informe2");
        $bg1=$x;
        $bg2=$y;

// --- EMPRESAS
        $empresas = DB::table('empresas')->orderBy('id')
            ->join ('users','empresas.user_id','=','users.id')
            ->select('empresas.id','empresas.nombre','empresas.sector')
            ->where ('users.id','=', Auth::id())
            ->get();

        // --- INFORMEFINANCIEROS
        $infin = DB::table('informefinancieros')->orderBy('nombre')
            ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
            ->join ('users','empresas.user_id','=','users.id')
            ->select('informefinancieros.id','informefinancieros.nombre','informefinancieros.anio','informefinancieros.empresas_id')
            ->where ('users.id','=', Auth::id())
            ->get();

        // --- GRUPOS
        $grupos = DB::table('grupos')->orderBy('codigo')
            ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
            ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
            ->join ('users','empresas.user_id','=','users.id')
            ->select('grupos.id','grupos.nombre','grupos.codigo','grupos.informefinancieros_id')
            ->where ('users.id','=', Auth::id())
            ->get();


        // --- CLASES
        $clases = DB::table('clases')->orderBy('codigo')
            ->join ('grupos','clases.grupos_id','=', 'grupos.id')
            ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
            ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
            ->join ('users','empresas.user_id','=','users.id')
            ->select('clases.id','clases.nombre','clases.codigo','clases.grupos_id')
            ->where ('users.id','=', Auth::id())
            ->get();

        // --- ESTADO DE RESULTADOS -------------------
        $esre = DB::table('estado_resultado')->orderBy('id')
            ->join ('informefinancieros','estado_resultado.informefinancieros_id','=', 'informefinancieros.id')
            ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
            ->join ('users','empresas.user_id','=','users.id')
            ->select(
                'estado_resultado.*',
                'estado_resultado.costodeventa as costov',
                'estado_resultado.ingreso as eingreso',
                'estado_resultado.gastodeoperacion as egastoO',
                'estado_resultado.gastofinancieros as egastoF',
                'estado_resultado.gastodeadministracion as egastoA',
                'estado_resultado.gastodeventaymercadeo as egastoV',
                'estado_resultado.otrosingresos as eotrosI',
                'estado_resultado.reservalegal as ereserva',
                'estado_resultado.impuestosobrelarenta as eimpuesto'
            )
            ->where ('users.id','=', Auth::id())
            ->where('estado_resultado.informefinancieros_id','=',$x)
            ->where('informefinancieros.id','=',$x)
            ->get();

        // --- ESTADO DE RESULTADOS -------------------
        $esre1 = DB::table('estado_resultado')->orderBy('id')
            ->join ('informefinancieros','estado_resultado.informefinancieros_id','=', 'informefinancieros.id')
            ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
            ->join ('users','empresas.user_id','=','users.id')
            ->select(
                'estado_resultado.*',
                'estado_resultado.costodeventa as costov',
                'estado_resultado.ingreso as eingreso',
                'estado_resultado.gastodeoperacion as egastoO',
                'estado_resultado.gastofinancieros as egastoF',
                'estado_resultado.gastodeadministracion as egastoA',
                'estado_resultado.gastodeventaymercadeo as egastoV',
                'estado_resultado.otrosingresos as eotrosI',
                'estado_resultado.reservalegal as ereserva',
                'estado_resultado.impuestosobrelarenta as eimpuesto'
            )
            ->where ('users.id','=', Auth::id())
            ->where('estado_resultado.informefinancieros_id','=',$y)
            ->where('informefinancieros.id','=',$y)
            ->get();



        // --- CUENTAS
        $cuentas = DB::table('cuentas')->orderBy('codigo')
            ->join ('clases','cuentas.clases_id','=', 'clases.id')
            ->join ('grupos','clases.grupos_id','=', 'grupos.id')
            ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
            ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
            ->join ('users','empresas.user_id','=','users.id')
            ->select('cuentas.id','cuentas.codigo','cuentas.nombre','cuentas.valor','cuentas.clases_id')
            ->where ('users.id','=', Auth::id())
            ->where ('informefinancieros.id','=',$x)
            //->where ('cuentas.nombre','=','TOTAL ACTIVO')
            ->get();

        // --- CUENTAS
        $cuentas1 = DB::table('cuentas')->orderBy('codigo')
            ->join ('clases','cuentas.clases_id','=', 'clases.id')
            ->join ('grupos','clases.grupos_id','=', 'grupos.id')
            ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
            ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
            ->join ('users','empresas.user_id','=','users.id')
            ->select('cuentas.id','cuentas.codigo','cuentas.nombre','cuentas.valor','cuentas.clases_id')
            ->where ('users.id','=', Auth::id())
            ->where ('informefinancieros.id','=',$y)
            //->where ('cuentas.nombre','=','TOTAL ACTIVO')
            ->get();
            // --- CUENTAS
        $cuentasss1 = DB::table('cuentas')->orderBy('codigo')
            ->join ('clases','cuentas.clases_id','=', 'clases.id')
            ->join ('grupos','clases.grupos_id','=', 'grupos.id')
            ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
            ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
            ->join ('users','empresas.user_id','=','users.id')
            ->select('cuentas.id','cuentas.codigo','cuentas.nombre','cuentas.valor','cuentas.clases_id')
            ->where ('users.id','=', Auth::id())
            //->where ('informefinancieros.id','=',$y)
            //->where ('cuentas.nombre','=','TOTAL ACTIVO')
            ->get();


        // --- SUB CUENTAS
        $subcuentas = DB::table('sub_cuentas')->orderBy('codigo')
            ->join ('cuentas','sub_cuentas.cuentas_id','=', 'cuentas.id')
            ->join ('clases','cuentas.clases_id','=', 'clases.id')
            ->join ('grupos','clases.grupos_id','=', 'grupos.id')
            ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
            ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
            ->join ('users','empresas.user_id','=','users.id')
            ->select('sub_cuentas.id','sub_cuentas.codigo','sub_cuentas.nombre','sub_cuentas.valor','sub_cuentas.cuentas_id')
            ->where ('users.id','=', Auth::id())
            ->get();

        //FILTRO PARA RATIOS
        $ratios = DB::table('cuentas')->orderBy('codigo')
            ->join ('clases','cuentas.clases_id','=', 'clases.id')
            ->join ('grupos','clases.grupos_id','=', 'grupos.id')
            ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
            ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
            ->join ('users','empresas.user_id','=','users.id')
            ->select('cuentas.*','cuentas.codigo as ccodigo','cuentas.nombre as rnombre','cuentas.valor as rcuentas', 'informefinancieros.nombre as inombre', 'grupos.nombre as gnombre', 'clases.nombre as cnombre')
            ->where ('users.id','=', Auth::id())
            ->where ('informefinancieros.id','=',$request->input('informe1'))
            //->where ('cuentas.codigo','=','1.1')
            ->where ('grupos.nombre','=','Activo')
            ->get();

        $ratios1 = DB::table('cuentas')->orderBy('codigo')
            ->join ('clases','cuentas.clases_id','=', 'clases.id')
            ->join ('grupos','clases.grupos_id','=', 'grupos.id')
            ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
            ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
            ->join ('users','empresas.user_id','=','users.id')
            ->select('cuentas.*','cuentas.codigo as ccodigo','cuentas.nombre as rnombre','cuentas.valor as rcuentas', 'informefinancieros.nombre as inombre','grupos.nombre as gnombre', 'clases.nombre as cnombre')
            ->where ('users.id','=', Auth::id())
            ->where ('informefinancieros.id','=',$request->input('informe2'))
            //->where ('cuentas.codigo','=','1.1')
            ->where ('grupos.nombre','=','Activo')
            ->get();


        $ratios121 = DB::table('cuentas')->orderBy('codigo')
            ->join ('clases','cuentas.clases_id','=', 'clases.id')
            ->join ('grupos','clases.grupos_id','=', 'grupos.id')
            ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
            ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
            ->join ('users','empresas.user_id','=','users.id')
            ->select('cuentas.*','cuentas.codigo as ccodigo','cuentas.nombre as rnombre','cuentas.valor as rcuentas', 'informefinancieros.nombre as inombre', 'grupos.nombre as gnombre', 'clases.nombre as cnombre')
            ->where ('users.id','=', Auth::id())
            ->where ('informefinancieros.id','=',$x)
            //->where ('grupos.nombre','=','Activo')
            //->where ('cuentas.codigo','=','1.2')
            ->get();


        $ratios122 = DB::table('cuentas')->orderBy('codigo')
            ->join ('clases','cuentas.clases_id','=', 'clases.id')
            ->join ('grupos','clases.grupos_id','=', 'grupos.id')
            ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
            ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
            ->join ('users','empresas.user_id','=','users.id')
            ->select('cuentas.*','cuentas.codigo as ccodigo','cuentas.nombre as rnombre','cuentas.valor as rcuentas', 'informefinancieros.nombre as inombre', 'grupos.nombre as gnombre', 'clases.nombre as cnombre')
            ->where ('users.id','=', Auth::id())
            ->where ('informefinancieros.id','=',$y)
            //->where ('cuentas.codigo','=','1.2')
            //->where ('grupos.nombre','=','Activo')
            ->get();

        $ratios2 = DB::table('cuentas')->orderBy('codigo')
            ->join ('clases','cuentas.clases_id','=', 'clases.id')
            ->join ('grupos','clases.grupos_id','=', 'grupos.id')
            ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
            ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
            ->join ('users','empresas.user_id','=','users.id')
            ->select('cuentas.*','cuentas.codigo as ccodigo','cuentas.nombre as rnombre','cuentas.valor as rcuentas', 'informefinancieros.nombre as inombre', 'grupos.nombre as gnombre', 'clases.nombre as cnombre')
            ->where ('users.id','=', Auth::id())
            ->where ('informefinancieros.id','=',$x)
            //->where ('grupos.nombre','=','Activo')
            //->orWhere ('grupos.nombre','=','Pasivo')
            ->get();

        $ratios3 = DB::table('cuentas')->orderBy('codigo')
            ->join ('clases','cuentas.clases_id','=', 'clases.id')
            ->join ('grupos','clases.grupos_id','=', 'grupos.id')
            ->join ('informefinancieros','grupos.informefinancieros_id','=', 'informefinancieros.id')
            ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
            ->join ('users','empresas.user_id','=','users.id')
            ->select('cuentas.*','cuentas.codigo as ccodigo','cuentas.nombre as rnombre','cuentas.valor as rcuentas', 'informefinancieros.nombre as inombre', 'grupos.nombre as gnombre', 'clases.nombre as cnombre')
            ->where ('users.id','=', Auth::id())
            ->where ('informefinancieros.id','=',$y)
            //->where ('grupos.nombre','=','Activo')
            //->orWhere ('grupos.nombre','=','Pasivo')
            ->get();


        $informe = DB::table('informefinancieros')->orderBy('nombre')
            ->join ('empresas','informefinancieros.empresas_id','=','empresas.id')
            ->join ('users','empresas.user_id','=','users.id')
            ->select('informefinancieros.id','informefinancieros.nombre','informefinancieros.anio','informefinancieros.empresas_id')
            ->where ('users.id','=', Auth::id())
            ->get();

        //RETORNANDO A LA VISTA
        return view('analisis.ratios')
            ->with('esre',$esre)
            ->with('esre1',$esre1)
            ->with('clases',$clases)
            ->with('cuentas',$cuentas)
            ->with('cuentas1',$cuentas1)
            ->with('subcuentas',$subcuentas)
            ->with('grupos',$grupos)
            ->with('empresas',$empresas)
            ->with('infin',$infin)
            ->with('ratios',$ratios)
            ->with('ratios1',$ratios1)
            ->with('ratios121',$ratios121)
            ->with('ratios122',$ratios122)
            ->with('ratios2',$ratios2)
            ->with('ratios3',$ratios3)
            ->with('informe',$informe)
            ->with('bg1',$bg1)
            ->with('bg2',$bg2)
            ->with('cuentasss1',$cuentasss1);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
