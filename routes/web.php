<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'DashboardController@index')->middleware('checkmanager');

Auth::routes();
Route::get('/client', 'PagesController@index')->middleware('checkclient');
Route::post('/send','PagesController@store');

Route::get('/order/{id}','DashboardController@order')->middleware('checkmanager');
Route::post('/orser/update/{id}','DashboardController@update')->middleware('checkmanager');

Route::post('/answer/{id}','DashboardController@answer')->middleware('checkmanager');
Route::get('/arhive', 'DashboardController@arhive')->middleware('checkmanager');

