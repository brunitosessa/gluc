<?php

use Illuminate\Http\Request;

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/bars/', 'Api\BarController@index');
	Route::get('/bars/{id}/', 'Api\BarController@show');
});
