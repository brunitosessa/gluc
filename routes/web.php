<?php


Route::get('admin-login', 'Auth\AdminLoginController@showLoginForm');
Route::post('admin-login', ['as'=>'admin-login','uses'=>'Auth\AdminLoginController@login']);

//Auth Routes
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//Admin Routes
Route::group(['middleware' => 'auth:admin'], function () {
	
	//Bar
	Route::get('/admin', 'Admin\AdminBarController@index')->name('admin.bars.index');
	Route::get('/admin/bars/create', 'Admin\AdminBarController@create')->name('admin.bars.create');
	Route::post('/admin/bars', 'Admin\AdminBarController@store')->name('admin.bars.store');
	Route::get('/admin/bars/{id}', 'Admin\AdminBarController@show')->name('admin.bars.show');
	Route::get('/admin/bars/{id}/edit', 'Admin\AdminBarController@edit')->name('admin.bars.edit');
	Route::patch('/admin/bars/{id}', 'Admin\AdminBarController@update')->name('admin.bars.update');
	Route::delete('/admin/bars/{id}', 'Admin\AdminBarController@destroy')->name('admin.bars.destroy');
	
	//Business hours
	Route::get('/admin/bars/{id}/businessHours', 'Admin\AdminBusinessHourController@index')->name('admin.bars.businessHours.index');
	Route::post('/admin/bars/{id}/businessHours', 'Admin\AdminBusinessHourController@store')->name('admin.bars.businessHours.store');
	Route::patch('/admin/bars/businessHours/{id}', 'Admin\AdminBusinessHourController@update')->name('admin.bars.businessHours.update');
	Route::delete('/admin/bars/businessHours/{id}', 'Admin\AdminBusinessHourController@destroy')->name('admin.bars.businessHours.destroy');

	//Promotion - Bar
	Route::get('/admin/bars/{b_id}/promotions', 'Admin\AdminPromotionController@index')->name('admin.bars.promotions.index');
	Route::get('/admin/bars/{b_id}/promotions/create', 'Admin\AdminPromotionController@create')->name('admin.bars.promotions.create');
	Route::post('/admin/bars/{b_id}/promotions', 'Admin\AdminPromotionController@store')->name('admin.bars.promotions.store');
	Route::get('/admin/bars/{b_id}/promotions/{p_id}', 'Admin\AdminPromotionController@show')->name('admin.bars.promotions.show');
	Route::get('/admin/bars/{b_id}/promotions/{p_id}/edit', 'Admin\AdminPromotionController@edit')->name('admin.bars.promotions.edit');
	Route::patch('/admin/bars/{b_id}/promotions/{p_id}', 'Admin\AdminPromotionController@update')->name('admin.bars.promotions.update');
	Route::delete('/admin/bars/{b_id}/promotions/{p_id}', 'Admin\AdminPromotionController@destroy')->name('admin.bars.promotions.destroy');

	//Promotion Hour
	Route::get('/admin/bars/{b_id}/promotions/{p_id}/hours', 'Admin\AdminPromotionHourController@index')->name('admin.bars.promotions.hours.index');
	Route::post('/admin/bars/{b_id}/promotions/{id}/hours', 'Admin\AdminPromotionHourController@store')->name('admin.bars.promotions.hours.store');
	Route::patch('/admin/bars/{b_id}/promotions/{id}/hours', 'Admin\AdminPromotionHourController@update')->name('admin.bars.promotions.hours.update');
	Route::delete('/admin/bars/{b_id}/promotions/{id}/hours', 'Admin\AdminPromotionHourController@destroy')->name('admin.bars.promotions.hours.destroy');

	//Publicities
	Route::get('/admin/publicities', 'Admin\AdminPublicityController@index')->name('admin.publicities.index');
	Route::get('/admin/publicities/create', 'Admin\AdminPublicityController@create')->name('admin.publicities.create');
	Route::post('/admin/publicities/store', 'Admin\AdminPublicityController@store')->name('admin.publicities.store');
	Route::get('/admin/publicities/{p_id}', 'Admin\AdminPublicityController@show')->name('admin.publicities.show');
	Route::get('/admin/publicities/{p_id}/edit', 'Admin\AdminPublicityController@edit')->name('admin.publicities.edit');
	Route::patch('/admin/publicities/{p_id}', 'Admin\AdminPublicityController@update')->name('admin.publicities.update');
	Route::delete('/admin/publicities/{p_id}', 'Admin\AdminPublicityController@destroy')->name('admin.publicities.destroy');

	//Event
	Route::get('/admin/events', 'Admin\AdminEventController@index')->name('admin.events.index');
	Route::get('/admin/events/create', 'Admin\AdminEventController@create')->name('admin.events.create');
	Route::post('/admin/events', 'Admin\AdminEventController@store')->name('admin.events.store');
	Route::get('/admin/events/{id}', 'Admin\AdminEventController@show')->name('admin.events.show');
	Route::get('/admin/events/{id}/edit', 'Admin\AdminEventController@edit')->name('admin.events.edit');
	Route::patch('/admin/events/{id}', 'Admin\AdminEventController@update')->name('admin.events.update');
	Route::delete('/admin/events/{id}', 'Admin\AdminEventController@destroy')->name('admin.events.destroy');
	//Happygluc
	Route::post('/admin/happygluc', 'Admin\AdminHappyglucController@store')->name('admin.happygluc.store');

	//Notification
	Route::get('/admin/notification', 'Admin\FirebaseController@sendAll')->name('admin.notification.sendAll');
});

//Bars Routes
Route::group(['middleware' => 'auth'], function () {
	//Bars
	Route::get('/', 'BarController@show')->name('bars.show');
	Route::get('/edit', 'BarController@edit')->name('bars.edit');
	Route::patch('/', 'BarController@update')->name('bars.update');
	Route::delete('/', 'BarController@destroy')->name('bars.destroy');

	//Business hours
	Route::get('/businessHours', 'BusinessHourController@index')->name('businessHours.index');
	Route::post('/businessHours', 'BusinessHourController@store')->name('businessHours.store');
	Route::patch('/businessHours/{id}', 'BusinessHourController@update')->name('businessHours.update');
	Route::delete('/businessHours/{id}', 'BusinessHourController@destroy')->name('businessHours.destroy');

	//Promotion
	Route::get('/promotions', 'PromotionController@index')->name('promotions.index');
	Route::get('/promotions/create', 'PromotionController@create')->name('promotions.create');
	Route::post('/promotions', 'PromotionController@store')->name('promotions.store');
	Route::get('/promotions/{id}', 'PromotionController@show')->name('promotions.show');
	Route::get('/promotions/{id}/edit', 'PromotionController@edit')->name('promotions.edit');
	Route::patch('/promotions/{id}', 'PromotionController@update')->name('promotions.update');
	Route::delete('/promotions/{id}', 'PromotionController@destroy')->name('promotions.destroy');

	//Promotion hour
	Route::get('/promotions/{id}/promotionHours', 'PromotionHourController@index')->name('promotions.hours.index');
	Route::post('/promotions/{id}/promotionHours', 'PromotionHourController@store')->name('promotions.hours.store');
	Route::patch('/promotions/{id}/promotionHours', 'PromotionHourController@update')->name('promotions.hours.update');
	Route::delete('/promotions/{id}/promotionHours', 'PromotionHourController@destroy')->name('promotions.hours.destroy');

	//Event
	Route::get('/events', 'EventController@index')->name('events.index');
	Route::get('/events/create', 'EventController@create')->name('events.create');
	Route::post('/events', 'EventController@store')->name('events.store');
	Route::get('/events/{id}', 'EventController@show')->name('events.show');
	Route::get('/events/{id}/edit', 'EventController@edit')->name('events.edit');
	Route::patch('/events/{id}', 'EventController@update')->name('events.update');
	Route::delete('/events/{id}', 'EventController@destroy')->name('events.destroy');

	//Happygluc
	Route::post('/happygluc', 'HappyglucController@store')->name('happygluc.store');

	//Chart
	Route::get('/charts', 'ChartController@index')->name('charts.index');
});