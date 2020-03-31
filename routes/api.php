<?php

use Illuminate\Http\Request;

Route::get('auth/{provider}', 'Api\SocialAuthController@redirectToProvider')->name('social.auth');
Route::get('auth/{provider}/callback', 'Api\SocialAuthController@handleProviderCallback');

//Route::group(['middleware' => 'auth:api'], function () {

	//Alternative - Old Version
    Route::post('/listaBares.php', 'Api\BarController@index');
	Route::post('/infoBar.php', 'Api\BarController@show');
	Route::post('/listaEventos.php', 'Api\EventController@index');
	Route::post('/listaPromociones.php', 'Api\PromotionController@index');
	Route::post('/listaPublicidadPrincipal.php', 'Api\PublicityController@index');
	Route::post('/listaRecomendados.php', 'Api\BarController@index');
	//End - Old Version


	//Bars
    Route::get('/bars/', 'Api\BarController@index');
 	Route::get('/bars/{id}/', 'Api\BarController@show');

	//Users
	Route::get('/users/updateFirebaseId', 'Api\UserController@updateFirebaseId');
	Route::get('/users/{bar_id}/useHappyGluc', 'Api\UserController@useHappyGluc');	

	//Events
	Route::get('/events/', 'Api\EventController@index');
	Route::get('/events/{id}/', 'Api\EventController@show');

	//Promotions
	Route::get('/promotions/', 'Api\PromotionController@index');

	//Publicities
	Route::get('/publicities/', 'Api\PublicityController@index');


//});
