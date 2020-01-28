<?php

Auth::routes();

//Users
//Route::get('/usuario/{id}', 'UsuariosController@ver')->where('id', '[0-9]+');

//Admin Routes
/*Route::group(['middleware' => 'auth'], function () {
	Route::get('/', 'BarController@index');
	Route::resource('bars', 'BarController');
	Route::get('bars/{id}/promotions', 'BarController@showPromotions');
	Route::resource('bars.promotions', 'PromotionController');
	Route::resource('events', 'EventController');
	Route::resource('publicities', 'PublicityController');
});
*/

Route::group(['middleware' => 'auth'], function () {
	Route::get('/', 'BarController@show')->name('bars.show');
	Route::get('/edit', 'BarController@edit')->name('bars.edit');
	Route::patch('/', 'BarController@update')->name('bars.update');
	Route::delete('/', 'BarController@destroy')->name('bars.destroy');
	Route::get('/promotions', 'BarController@showPromotions')->name('bars.promotions');

	Route::get('/promotions', 'PromotionController@index')->name('promotions.index');
	Route::get('/promotions/create', 'PromotionController@create')->name('promotions.create');
	Route::post('/promotions', 'PromotionController@store')->name('promotions.store');
	Route::get('/promotions/{id}', 'PromotionController@show')->name('promotions.show');
	Route::get('/promotions/{id}/edit', 'PromotionController@edit')->name('promotions.edit');
	Route::patch('/promotions/{id}', 'PromotionController@update')->name('promotions.update');
	Route::delete('/promotions/{id}', 'PromotionController@destroy')->name('promotions.destroy');

	Route::get('/events', 'EventController@index')->name('events.index');
	Route::get('/events/create', 'EventController@create')->name('events.create');
	Route::post('/events', 'EventController@store')->name('events.store');
	Route::get('/events/{id}', 'EventController@show')->name('events.show');
	Route::get('/events/{id}/edit', 'EventController@edit')->name('events.edit');
	Route::patch('/events/{id}', 'EventController@update')->name('events.update');
	Route::delete('/events/{id}', 'EventController@destroy')->name('events.destroy');

	Route::post('/happygluc', 'HappyglucController@store')->name('happygluc.store');

	Route::get('/charts', 'ChartController@index')->name('charts.index');
	//Route::post('/', 'BarController@index');
	//HACER LAS RUTAS A MANO, NO CON RESOURCE
	//Route::get('bars/{id}/promotions', 'BarController@showPromotions');
	//Route::resource('bars.promotions', 'PromotionController');
	//Route::resource('events', 'EventController');
	//Route::resource('publicities', 'PublicityController');
});