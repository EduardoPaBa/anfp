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
Route::get('/', function () {
    return view('index');
})->name('index');


Route::get('/balancegeneral',[App\Http\Controllers\prueba::class,'index'])
	->name('analisis.balancegeneral');
Route::get('/estadoresultados',[App\Http\Controllers\esController::class,'index'])
	->name('analisis.estadoresultados');
Route::post('/estadoresultados',[App\Http\Controllers\esController::class,'store'])
	->name('estadoresultados.store');

Route::get('/analisishorizontal',[App\Http\Controllers\ahController::class,'index'])
	->name('analisishorizontal.index');

Route::get('/analisisvertical',[App\Http\Controllers\avController::class,'index'])
	->name('analisisvertical.index');

Route::get('/ratios',[App\Http\Controllers\Ratios::class,'index'])->name('analisis.ratios');

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
