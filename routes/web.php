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
Route::post('/scholarship/step/1/profile/savedraft', 'student\RegWizardController@draft_profile')->name('step_profile_draft');
Route::post('/scholarship/step/1/profile/save', 'student\RegWizardController@update_profile')->name('step_profile_save');
Route::post('/upload-crop-photo', 'student\RegWizardController@crop_profpic');

Route::get('/scholarship/step/2/education', 'student\RegWizardController@education')->name('step_education');
Route::post('/scholarship/step/2/education/save', 'student\RegWizardController@update_education');


Route::get('/scholarship/step/3/achievement', 'student\RegWizardController@achievement')->name('step_achievement');
Route::post('/scholarship/step/3/achievement/savedraft', 'student\RegWizardController@draft_achievement')->name('step_achievement_draft');
Route::post('/scholarship/step/3/achievement/save', 'student\RegWizardController@update_achievement')->name('step_achievement_save');

Route::get('/scholarship/step/4/motivation', 'student\RegWizardController@motivation')->name('step_motivation');
Route::post('/scholarship/step/4/motivation/save', 'student\RegWizardController@update_motivation')->name('step_motivation_save');

Route::get('/scholarship/step/5/document', 'student\RegWizardController@document')->name('step_document');
Route::post('/scholarship/step/5/document/save', 'student\RegWizardController@update_document')->name('step_document_save');

Route::get('/scholarship/step/6/preview', 'student\RegWizardController@preview')->name('step_preview');
Route::post('/scholarship/step/6/preview/save', 'student\RegWizardController@update_preview')->name('step_preview_save');

// Route::get('/scholarship/step/6/other', 'student\RegWizardController@other')->name('step_other');
// Route::post('/scholarship/step/6/other/save', 'student\RegWizardController@update_other');


Route::post('/upload-crop-photo-ktp', 'student\RegWizardController@upload_ktp');
Route::post('/upload-crop-photo-kk', 'student\RegWizardController@upload_kk');



});
