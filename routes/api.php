<?php

use Illuminate\Http\Request;

Route::get('auth/{provider}', 'Api\SocialAuthController@redirectToProvider')->name('social.auth');
Route::get('auth/{provider}/callback', 'Api\SocialAuthController@handleProviderCallback');

//Route::group(['middleware' => 'auth:api'], function () {
	//Alternative - Old Version
    Route::post('/listaBares.php', 'Api\BarController@index');
    Route::get('/listaBares.php', 'Api\BarController@index');
	Route::post('/infoBar', 'Api\BarController@show');
	Route::get('/infoBar', 'Api\BarController@show');
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

//});
