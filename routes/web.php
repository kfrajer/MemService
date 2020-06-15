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
Route::get('/toc','PagesController@tocPage')->name('pages.tocPage');

Route::resource('/memManager','menuStorageController');
//Route::get('/memobjects','menuStorageController@index')->name('memManager.index');
//Route::get('/memobjects/create','menuStorageController@create')->name('memManager.create');
//Route::post('/memobjects','menuStorageController@store')->name('memManager.store'); // making a post request
//Route::get('/memobjects/{id}','menuStorageController@show')->name('memManager.show');
//Route::get('/memobjects/{id}/edit','menuStorageController@edit')->name('memManager.edit');
//Route::put('/memobjects/{id}','menuStorageController@update')->name('memManager.update'); // making a put request
//Route::delete('/memobjects/{id}','menuStorageController@destroy')->name('memManager.destroy'); // making a delete request

