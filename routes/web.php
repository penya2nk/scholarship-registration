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


// Route::get('/', function () {return view('welcome');});
Route::get('/uniquecode','consumenController@unique_code');

Route::get('/', 'gatewayController@indexlogin');
Route::get('/login', 'gatewayController@indexlogin');
Route::get('/dashboard/login', 'gatewayController@indexlogin');
Route::get('/dashboard/logout', 'gatewayController@logout');

// Route::group([
//     'middleware' => 'checksession'
// ], function () {

Route::get('/dashboard', 'dashboardController@indexdashboard');

// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard/register', 'gatewayController@indexlogin');
Route::get('/dashboard/{token}/{id}', 'Auth\RegisterController@verify_token');
Route::post('/resendemail','Auth\LoginController@resendemail')->name('resendverificationemail');
