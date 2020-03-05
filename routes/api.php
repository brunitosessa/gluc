<?php

use Illuminate\Http\Request;

Route::get('auth/{provider}', 'Api\SocialAuthController@redirectToProvider')->name('social.auth');
Route::get('auth/{provider}/callback', 'Api\SocialAuthController@handleProviderCallback');

//Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/bars/', 'Api\BarController@index');
	Route::get('/bars/{id}/', 'Api\BarController@show');
//});
