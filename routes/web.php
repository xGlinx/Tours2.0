<?php

use Illuminate\Support\Facades\Route;

// type = 1 = User
// type = 2 = Admin

Route::get('/', 'FrontController@index');

Auth::routes();

Route::resource('/user', 'UserController')->names('user');
Route::resource('/tour', 'TourController')->names('tour');
Route::resource('/route', 'RouteController')->names('route');
Route::resource('/restaurant', 'RestaurantController')->names('restaurant');
Route::resource('/lodging', 'LodgingController')->names('lodging');
Route::resource('/reserve', 'ReserveController')->names('reserve');

Route::resource('/tours', 'ToursController')->names('tours');
Route::resource('/reserves', 'ReservesController')->names('reserves');

Route::resource('/huancayo', 'HuancayoController')->names('huancayo');
Route::resource('/identidad', 'IdentidadController')->names('identidad');
Route::resource('/huaytapallana', 'HuaytapallanaController')->names('huaytapallana');
Route::resource('/ñahuimpuquio', 'ÑahuimpuquioController')->names('ñahuimpuquio');

Route::get('/home', 'HomeController@index')->name('home');

