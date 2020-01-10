<?php

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

//Usuarios
Route::get('/usuario/{id}', 'UsuariosController@ver')->where('id', '[0-9]+');

Route::get('/bars', 'BarController@index')->middleware('auth')->name('bars.index');
Route::get('/bars/{id}', 'BarController@show')->where('id', '[0-9]+')->name('bars.show');
Route::get('/bars/create', 'BarController@create')->name('bars.create');
Route::post('/bars', 'BarController@store')->name('bars.store');
Route::get('/bars/{id}/edit', 'BarController@edit')->where('id', '[0-9]+')->name('bars.edit');
Route::patch('/bars/{id}', 'BarController@update')->name('bars.update');
Route::delete('/bars/{id}', 'BarController@destroy')->name('bars.destroy');

Route::get('/events', 'EventController@index')->middleware('auth')->name('events.index');
Route::get('/events/{id}', 'EventController@show')->where('id', '[0-9]+')->name('events.show');
Route::get('/events/create', 'EventController@create')->name('events.create');
Route::post('/events', 'EventController@store')->name('events.store');
Route::get('/events/{id}/edit', 'EventController@edit')->where('id', '[0-9]+')->name('events.edit');
Route::patch('/events/{id}', 'EventController@update')->name('events.update');
Route::delete('/events/{id}', 'EventController@destroy')->name('events.destroy');

Route::get('/home', 'HomeController@index')->name('home');
