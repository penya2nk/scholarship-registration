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
Route::get('/logout', 'gatewayController@logout')->name('logout');

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


Route::group([
    'middleware' => 'auth'
], function () {

Route::get('/scholarship/step/1/profile', 'student\RegWizardController@profile')->name('step_profile');
Route::post('/scholarship/step/1/profile/save', 'student\RegWizardController@update_profile');

Route::get('/scholarship/step/2/education', 'student\RegWizardController@education')->name('step_education');
Route::post('/scholarship/step/2/education/save', 'student\RegWizardController@update_education');

Route::get('/scholarship/step/3/achievement', 'student\RegWizardController@achievement')->name('step_achievement');
Route::post('/scholarship/step/3/achievement/save', 'student\RegWizardController@update_achievement');

Route::get('/scholarship/step/4/motivation', 'student\RegWizardController@motivation')->name('step_motivation');
Route::post('/scholarship/step/4/motivation/save', 'student\RegWizardController@update_motivation');

Route::get('/scholarship/step/5/document', 'student\RegWizardController@document')->name('step_profile');
Route::post('/scholarship/step/5/document/save', 'student\RegWizardController@update_document');

Route::get('/scholarship/step/6/other', 'student\RegWizardController@other')->name('step_other');
Route::post('/scholarship/step/6/other/save', 'student\RegWizardController@update_other');





});
