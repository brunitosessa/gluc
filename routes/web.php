<?php

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

//Usuarios
Route::get('/usuario/{id}', 'UsuariosController@ver')->where('id', '[0-9]+');

//BARES
Route::get('/bar/all', 'BarsController@all');
Route::get('/bar/{id}', 'BarsController@ver')->where('id', '[0-9]+');

//Create Bar
Route::get('/bar/new', 'BarsController@new');
Route::post('/bar/create', 'BarsController@create');

Route::get('/bar/edit', 'BarsController@edit');
Route::post('/bar/update', 'BarsController@update');


Route::get('/home', 'HomeController@index')->name('home');
