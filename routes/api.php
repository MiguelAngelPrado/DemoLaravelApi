<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signUp');

     Route::group(['middleware' => 'accesapi'], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
        //Route::apiResource('contratos','ContratosCorporativosController');
        //Route::apiResource('empresa','EmpresaController');
        //--Corporativo-------------------------------------------------
        Route::get('corporativos', 'CorporativoController@index');
        Route::post('corporativo', 'CorporativoController@store');
        Route::put('corporativo/{id}', 'CorporativoController@edit');
        Route::patch('corporativo/{id}', 'CorporativoController@update');
        //--Empresa-------------------------------------------------
        Route::get('empresas', 'EmpresaController@index');
        Route::post('empresa', 'EmpresaController@store');
        Route::put('empresa/{id}', 'EmpresaController@edit');
        Route::patch('empresa/{id}', 'EmpresaController@update');
        Route::delete('empresa/{id}', 'EmpresaController@destroy');
        //--Contacto-------------------------------------------------
        Route::get('contactos', 'ContactoController@index');
        Route::post('contacto', 'ContactoController@store');
        Route::put('contacto/{id}', 'ContactoController@edit');
        Route::patch('contacto/{id}', 'ContactoController@update');
        Route::delete('contacto/{id}', 'ContactoController@destroy');
        //--Contrato-------------------------------------------------
        Route::get('contratos', 'ContratoController@index');
        Route::post('contrato', 'ContratoController@store');
        Route::put('contrato/{id}', 'ContratoController@edit');
        Route::patch('contrato/{id}', 'ContratoController@update');
        Route::delete('contrato/{id}', 'ContratoController@destroy');
        //--Documento-------------------------------------------------
        Route::get('documentos', 'DocumentosController@index');
        Route::post('documento', 'DocumentosController@store');
        Route::put('documento/{id}', 'DocumentosController@edit');
        Route::patch('documento/{id}', 'DocumentosController@update');
        Route::delete('documento/{id}', 'DocumentosController@destroy');
        //---Informacion de corporativo-------------------------------
        Route::get('corporativos/{id}', 'CorporativoController@corporativo');
     });
});