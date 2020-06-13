<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','PagesController@index')->name('pages.index');
Route::get('/about','PagesController@about')->name('pages.about');

Route::get('/signin','SessionController@signin')->name('pages.signin');

Route::resource('/memobjects','menuStorageController');
//Route::get('/memobjects','menuStorageController@index')->name('memobjects.index');
//Route::get('/memobjects/create','menuStorageController@create')->name('memobjects.create');
//Route::post('/memobjects','menuStorageController@store')->name('memobjects.store'); // making a post request
//Route::get('/memobjects/{id}','menuStorageController@show')->name('memobjects.show');
//Route::get('/memobjects/{id}/edit','menuStorageController@edit')->name('memobjects.edit');
//Route::put('/memobjects/{id}','menuStorageController@update')->name('memobjects.update'); // making a put request
//Route::delete('/memobjects/{id}','menuStorageController@destroy')->name('memobjects.destroy'); // making a delete request

