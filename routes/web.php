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

Route::get('/','HomeController@index');
Route::get('/home', 'HomeController@index')->name('pages.index');
//Route::get('/home', 'PagesController@index')->name('pages.index')->middleware('verified');

//Helper class that generates all the routes required for user authentication
//Summary of routes generated below
Auth::routes(['verify' => true]);

/**
 * Login Route(s)
 */
//Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
//Route::post('login', 'Auth\LoginController@login');
//Route::post('logout', 'Auth\LoginController@logout')->name('logout');

/**
 * Register Route(s)
 */
//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('register', 'Auth\RegisterController@register');

/**
 * Password Reset Route(S)
 */
//Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

/**
 * Email Verification Route(s)
 */
//Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
//Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
//Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
