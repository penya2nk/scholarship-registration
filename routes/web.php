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

Route::get('/scholarship/step/------/education', 'student\RegWizardController@education')->name('step_education');
Route::post('/scholarship/step/------/education/save', 'student\RegWizardController@update_education');


Route::get('/scholarship/step/2/achievement', 'student\RegWizardController@achievement')->name('step_achievement');
Route::post('/scholarship/step/2/achievement/savedraft', 'student\RegWizardController@draft_achievement')->name('step_achievement_draft');
Route::post('/scholarship/step/2/achievement/save', 'student\RegWizardController@update_achievement')->name('step_achievement_save');

Route::get('/scholarship/step/3/motivation', 'student\RegWizardController@motivation')->name('step_motivation');
Route::post('/scholarship/step/3/motivation/save', 'student\RegWizardController@update_motivation')->name('step_motivation_save');

Route::get('/scholarship/step/4/document', 'student\RegWizardController@document')->name('step_document');
Route::post('/scholarship/step/4/document/save', 'student\RegWizardController@update_document')->name('step_document_save');

Route::get('/scholarship/step/5/preview', 'student\RegWizardController@preview')->name('step_preview');
Route::post('/scholarship/step/5/preview/save', 'student\RegWizardController@update_preview')->name('step_preview_save');

// Route::get('/scholarship/step/6/other', 'student\RegWizardController@other')->name('step_other');
// Route::post('/scholarship/step/6/other/save', 'student\RegWizardController@update_other');
Route::get('/scholarship/step/review_submit', 'student\RegWizardController@submit_review')->name('step_submit_review');

Route::get('/scholarship/step/final_submit', 'student\RegWizardController@final_submit')->name('step_final_submit');
Route::post('/scholarship/step/final_submit', 'student\RegWizardController@final_submit_save')->name('step_final_submit_save');



Route::post('/upload-crop-photo-ktp', 'student\RegWizardController@upload_ktp');
Route::post('/upload-crop-photo-kk', 'student\RegWizardController@upload_kk');
Route::post('/upload-crop-photo-ktm', 'student\RegWizardController@upload_ktm');

Route::post('/upload-crop-photo-home-front', 'student\RegWizardController@upload_home_front');
Route::post('/upload-crop-photo-home-out', 'student\RegWizardController@upload_home_out');
Route::post('/upload-crop-photo-home-side', 'student\RegWizardController@upload_home_side');
Route::post('/upload-crop-photo-home-in', 'student\RegWizardController@upload_home_in');

Route::post('/upload-crop-photo-sktm', 'student\RegWizardController@upload_sktm');
Route::post('/upload-crop-photo-parent-sallary', 'student\RegWizardController@upload_parent_sallary');
Route::post('/upload-crop-photo-transcript-score', 'student\RegWizardController@upload_transcript_score');
Route::post('/upload-crop-photo-active-student', 'student\RegWizardController@upload_active_student');



Route::get('/validate', 'admin\ValidationController@count_null');





});
