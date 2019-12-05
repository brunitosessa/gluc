<?php

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

//Usuarios
Route::get('/usuario/{id}', 'UsuariosController@ver')->where('id', '[0-9]+');

Route::get('/bars', 'BarsController@index')->middleware('auth')->name('bar.index');
Route::get('/bars/{id}', 'BarsController@show')->where('id', '[0-9]+')->name('bar.show');
Route::get('/bars/create', 'BarsController@create')->name('bar.create');
Route::post('/bars', 'BarsController@store')->name('bar.store');
Route::get('/bars/{id}/edit', 'BarsController@edit')->where('id', '[0-9]+')->name('bar.edit');
Route::patch('/bars/{id}', 'BarsController@update')->name('bar.update');
Route::delete('/bars/{id}', 'BarsController@destroy')->name('bar.destroy');

Route::get('/home', 'HomeController@index')->name('home');
