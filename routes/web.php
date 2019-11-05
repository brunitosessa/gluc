<?php

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

//Usuarios
Route::get('/usuario/{id}', 'UsuariosController@ver')->where('id', '[0-9]+');

//Bares
Route::get('/bar/{id}', 'BarController@ver')->where('id', '[0-9]+');
//Crear Bar
Route::get('/bar/nuevo', 'BarController@nuevo');
Route::post('/guardarBar', 'BarController@guardar');