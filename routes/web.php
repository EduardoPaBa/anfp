<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/
//Route::name('')->get('/imprimir', 'Controller@');
Route::get('/print',[App\Http\Controllers\Controller::class,'imprimir'])
	->name('print');


Route::get('/', function () {
    return view('index');
})->name('indexx');

Route::get('/inicio',[App\Http\Controllers\InicioController::class,'index'])
	->name('index');
Route::get('/balancegeneral',[App\Http\Controllers\prueba::class,'index'])
	->name('analisis.balancegeneral');

//Route::get('/estadoresultados',[App\Http\Controllers\esController::class,'index'])
//	->name('analisis.estadoresultados');
Route::resource('/estadoresultados', 'App\Http\Controllers\esController');
/*
Route::post('/estadoresultados',[App\Http\Controllers\esController::class,'store'])
	->name('estadoresultados.store');
Route::get('/estadoresultados/{estadoresultados}/edit',[App\Http\Controllers\esController::class,'edit'])
	->name('estadoresultados.edit');
Route::put('/estadoresultados/{estadoresultados}',[App\Http\Controllers\esController::class,'update'])
	->name('estadoresultados.update');
Route::delete('/estadoresultados/{estadoresultados}',[App\Http\Controllers\esController::class,'destroy'])
	->name('estadoresultados.destroy');
*/
Route::get('/analisishorizontal',[App\Http\Controllers\ahController::class,'index'])
	->name('analisishorizontal.index');

Route::get('/analisisvertical',[App\Http\Controllers\avController::class,'index'])
	->name('analisisvertical.index');
Route::get('/detalle_ah',[App\Http\Controllers\detalleahController::class,'index'])
	->name('detalleah.index');
Route::post('/analisishorizontal',[App\Http\Controllers\detalleahController::class,'store'])
	->name('detalleah.store');

Route::get('/ratios',[App\Http\Controllers\Ratios::class,'index'])->name('analisis.ratios');
Route::get('/detalleratio',[App\Http\Controllers\DetalleRatio::class,'index'])->name('analisis.detalleratio');

Route::get('/detalleConclusion',[App\Http\Controllers\detalleConclusion::class,'index'])->name('analisis.detalleConclusion');

Route::resource('/ratiosConclusion', 'App\Http\Controllers\RatiosConclusionController');

//-------------------SUB CUENTAS
//Route::get('/subcuentas','SubCuentasController@index');
	Route::resource('/sub_cuentas', 'App\Http\Controllers\SubCuentaController');
//----------------CUENTAS
	Route::resource('/cuentas', 'App\Http\Controllers\CuentaController');

//-------------GRUPO
	//SE PUEDE MEJORAR ESTAS RUTAS
	/*
	Route::get('/g/create',[App\Http\Controllers\GrupoController::class,'create'])
	->name('grupos.create');
	Route::get('/g/{grupo}/edit',[App\Http\Controllers\GrupoController::class,'edit'])
	->name('grupos.edit');
	Route::put('/g/{grupo}',[App\Http\Controllers\GrupoController::class,'update'])
	->name('grupos.update');
	Route::delete('/g/{grupo}',[App\Http\Controllers\GrupoController::class,'destroy'])
	->name('grupos.destroy');
	Route::post('/g',[App\Http\Controllers\GrupoController::class,'store'])
	->name('grupos.store');
	*/
	//OPTIMIZANDO RUTAS DE CRUD
	Route::resource('/grupos', 'App\Http\Controllers\GrupoController');

//---------------CLASE
	Route::resource('/clases', 'App\Http\Controllers\ClaseController');
	/*
//---------------BALANCES GENERALES (SEPARADOR Y POR AÑOS)
	Route::get('/bg/create',[App\Http\Controllers\BalancegeneralController::class,'create'])
	->name('balancesgenerales.create');
	Route::post('/bg',[App\Http\Controllers\BalancegeneralController::class,'store'])
	->name('balancesgenerales.store');
*/
//---------------INFORMES FINANCIEROS
	Route::resource('/informefinancieros', 'App\Http\Controllers\InformefinancieroController');

//---------------EMPRESA
	Route::resource('/empresas', 'App\Http\Controllers\EmpresaController');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
	->name('home');

Route::resource('/ratiosPrueba', 'App\Http\Controllers\RatioTestController');
