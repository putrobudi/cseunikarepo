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

//Route::get('/', 'ListingsController@index');

//Route::get('/', 'KegiatanController@index');

Route::get('/', 'PagesController@getHome');
Route::get('/hmpssi', 'PagesController@getHMPSSI');
Route::get('/bem', 'PagesController@getBEM');
Route::get('senat', 'PagesController@getSenat');
Route::get('/hmpti', 'PagesController@getHMPTI');


//Disabling register routes
//Auth::routes();

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

//I believe /updateValidasi is made when you try to link to @updateValidasi function
//in controller. Example when you click submit type button that directs to updateValidasi
//function. 
Route::patch('kegiatans/{kegiatan}/updateValidasi', 'KegiatanController@updateValidasi');
Route::get('kegiatans/createkegiatanhmpssi', 'KegiatanController@createHMPSSI');
Route::get('kegiatans/createkegiatanbem', 'KegiatanController@createBEM');
Route::get('kegiatans/createkegiatansenat', 'KegiatanController@createSENAT');
Route::get('kegiatans/createkegiatanhmpti', 'KegiatanController@createHMPTI');
Route::resource('kegiatans', 'KegiatanController');


Route::resource('peran', 'PeranController');
Route::resource('siswa', 'SiswaController');
Route::resource('dosen', 'DosenController');

Route::get('/dashboard', 'DashboardController@index');


