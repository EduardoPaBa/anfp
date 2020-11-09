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

//-------------------SUB CUENTAS
//Route::get('/subcuentas','SubCuentasController@index');
Route::get('/sc',[App\Http\Controllers\SubCuentaController::class,'index'])
	->name('subcuentas.index');

Route::get('/sc/create',[App\Http\Controllers\SubCuentaController::class,'create'])
	->name('subcuentas.create');

Route::post('/sc',[App\Http\Controllers\SubCuentaController::class,'store'])
	->name('subcuentas.store');
//----------------CUENTAS
	Route::get('/c/create',[App\Http\Controllers\CuentaController::class,'create'])
	->name('cuentas.create');
	Route::post('/c',[App\Http\Controllers\CuentaController::class,'store'])
	->name('cuentas.store');

//-------------GRUPO
	Route::get('/g/create',[App\Http\Controllers\GrupoController::class,'create'])
	->name('grupos.create');
	Route::post('/g',[App\Http\Controllers\GrupoController::class,'store'])
	->name('grupos.store');

//---------------CLASE
	Route::get('/cl/create',[App\Http\Controllers\ClaseController::class,'create'])
	->name('clases.create');
	Route::post('/cl',[App\Http\Controllers\ClaseController::class,'store'])
	->name('clases.store');
	/*
//---------------BALANCES GENERALES (SEPARADOR Y POR AÑOS)
	Route::get('/bg/create',[App\Http\Controllers\BalancegeneralController::class,'create'])
	->name('balancesgenerales.create');
	Route::post('/bg',[App\Http\Controllers\BalancegeneralController::class,'store'])
	->name('balancesgenerales.store');
*/
//---------------INFORMES FINANCIEROS
	Route::get('/if/create',[App\Http\Controllers\InformefinancieroController::class,'create'])
	->name('informesfinancieros.create');

	Route::post('/if',[App\Http\Controllers\InformefinancieroController::class,'store'])
	->name('informesfinancieros.store');




//---------------EMPRESA
	Route::get('/e/create',[App\Http\Controllers\EmpresaController::class,'create'])
	->name('empresas.create');
	Route::post('/e',[App\Http\Controllers\EmpresaController::class,'store'])
	->name('empresas.store');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
	->name('home');
