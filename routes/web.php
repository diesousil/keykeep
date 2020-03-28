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

Route::get('login', 'UserController@login')->name("login");
Route::post('login', 'UserController@login')->name("login");
Route::get('logout', 'UserController@logout')->name("logout");
Route::get('forgot', 'UserController@forgot')->name("forgot");
Route::get('recover', 'UserController@recover')->name("recover");
Route::get('register', 'UserController@register')->name("register");

Route::group(['middleware' => 'auth'], function() {
	Route::get('/','HomeController@index');
	Route::get('about','HomeController@about');
	
	Route::prefix('groups')->group(function() {
		Route::get('','GroupController@index');	
		Route::get('create','GroupController@create');
		Route::get('edit','GroupController@edit');
		Route::post('save','GroupController@save');
		Route::post('delete','GroupController@delete');
	});
	
	Route::prefix('credentials')->group(function() {
		Route::get('','CredentialController@index');	
		Route::get('create','CredentialController@create');
		Route::get('edit','CredentialController@edit');
		Route::post('save','CredentialController@save');
		Route::post('delete','CredentialController@delete');
	});
	
	Route::prefix('users')->group(function() {
		Route::get('','UserController@index');	
		Route::get('create','UserController@create');
		Route::get('edit','UserController@edit');
		Route::post('save','UserController@save');
		Route::post('delete','UserController@delete');
	});
});

