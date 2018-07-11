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
	return view('welcome');
});

Auth::routes();

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

// Route::prefix('admin')->group(function () {
// 	Route::get('/', 'AdminController@index')->name('admin.dashboard');
// 	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
// 	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
// 	Route::get('/logout', 'Auth\AdminLoginController@logoutAdmin')->name('admin.logout');
// });

Auth::routes();
Route::get('/home', 'MedicalController@index');
Route::get('/editProfile/{id}', 'HomeController@editProfile')->name('editProfile');
Route::post('/editUser/{id}', 'HomeController@editUser')->name('editUser');
Route::post('/autoComplete', 'MedicalController@autoComplete');
Route::get('/newRequest', 'MedicalController@create')->name('newRequest');
Route::post('/request', 'MedicalController@store')->name('request');
Route::get('/request/edit/{id}', 'MedicalController@edit')->name('request.edit');
Route::post('/request/update/{id}', 'MedicalController@update')->name('request.update');
Route::post('/request/delete/{id}', 'MedicalController@destroy')->name('request.destroy');
// Route::match(['get', 'post'], '/generatePdf/{id}', 'MedicalController@generatePdf')->name('generatePdf');
Route::get('view/{id}', 'MedicalController@viewRecord')->name('view');
// Route::post('/generatePdf/{id}', 'MedicalController@generatePdf')->name('generatePdf');
Route::get('generate-pdf', 'MedicalController@pdfview')->name('generate-pdf');