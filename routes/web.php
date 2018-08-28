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

Route::get('/', function () {
    return view('/dashboard/stats');
});

Auth::routes();


Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/requests', 'ResponseController@index')->name('requests');
Route::get('/account', 'AccountController@index')->name('account');
Route::post('/account', 'AccountController@create')->name('createaccount');
Route::get('/account/new', 'AccountController@index')->name('new_account');
Route::post('/account/:id', 'AccountController@update')->name('editaccount');
Route::post('/requests', 'ResponseController@get');
