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

/*Route::get('/', function () {
    return view('/layouts/welcome');
});*/

Route::get('/', 'AlbumController@index');
Route::get('/user/{my}', 'AlbumController@user');

Auth::routes();

Route::get('/logout' , 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/create', ['middleware'=>'auth', 'uses'=>'AlbumController@create']);
Route::get('/edit/{id}', 'AlbumController@edit');
Route::get('/delete/{id}', ['middleware'=>'auth', 'uses'=>'AlbumController@delete']);
Route::post('/store', 'AlbumController@store');
Route::post('/update', 'AlbumController@update');
