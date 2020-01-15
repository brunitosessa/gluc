<?php

Auth::routes();

//Users
//Route::get('/usuario/{id}', 'UsuariosController@ver')->where('id', '[0-9]+');
Route::group(['middleware' => 'auth'], function () {
	Route::get('/', 'BarController@index');
	Route::resource('bars', 'BarController');
	Route::get('bars/{id}/promotions', 'BarController@showPromotions');
	Route::resource('bars.promotions', 'PromotionController');
	Route::resource('events', 'EventController');
	Route::resource('publicities', 'PublicityController');
});
