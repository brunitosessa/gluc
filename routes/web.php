<?php

Auth::routes();

//Users
//Route::get('/usuario/{id}', 'UsuariosController@ver')->where('id', '[0-9]+');

//Admin Routes
Route::group(['middleware' => 'auth'], function () {
	Route::get('/', 'BarController@index');
	Route::resource('bars', 'BarController');
	Route::get('bars/{id}/promotions', 'BarController@showPromotions');
	Route::resource('bars.promotions', 'PromotionController');
	Route::resource('events', 'EventController');
	Route::resource('publicities', 'PublicityController');
});

/*
Route::group(['middleware' => 'auth'], function () {
	Route::get('/', 'BarController@show');
	Route::post('/', 'BarController@index');
	//HACER LAS RUTAS A MANO, NO CON RESOURCE
	Route::get('bars/{id}/promotions', 'BarController@showPromotions');
	Route::resource('bars.promotions', 'PromotionController');
	Route::resource('events', 'EventController');
	Route::resource('publicities', 'PublicityController');
});
*/