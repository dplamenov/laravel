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
Route::get('/','pageController@index');
Route::resource('page','pageController');
Route::post('admin/login','adminController@login');
Route::get('logout','adminController@logout');
Route::get('admin','adminController@index');

Route::get('admin/page','adminController@viewPage');
Route::get('admin/page/delete/{id}','adminController@deletePage');