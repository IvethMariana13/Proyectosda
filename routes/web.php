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

Route::get('/', function () {
    return view('welcome');
});
//Ejemplo 1 -Regresando texto
Route::get('/texto', function(){
    return '<h1>Esto es un texto de prueba</h1>';
});
//Ejemplo 2 - con array
Route::get('/arreglo', function(){
    $arreglo =
    [
        'Id'=>'1',
        'Descripcion'=>'Producto1'
    ];
    return $arreglo;
});
//Ejemplo 3 -Parametros
Route::get('/nombre/{nombre}', function($nombre){
    return '<h1>el nombre es: '.$nombre.' </h1>';
});
//Ejemplo 4 -Parametros con default
Route::get('/cliente/{cliente?}', function($cliente='Cliente general'){
    return '<h1>El cliente es: '.$cliente.' </h1>';
});
//Ejemplo 5 
Route::get('/ruta1', function(){
    return '<h1>Esto es la vista de la ruta 1</h1>';
})->name('rutaNro1');

Route::get('/ruta2', function(){
    //return '<h1>Esto es la vista de la ruta 2</h1>';
    return redirect()->route('rutaNro1');
});

//Ejemplo 6 -Validacion de usuario
Route::get('/usuario/{usuario}', function ($usuario) {
    return '<h1>El usuario es: '.$usuario.'</h1>';
})->where('usuario','[0-9]+');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
