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
Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function() {
   ####################Authenitcation For Admin#####################
   Route::get('/login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
   Route::post('/login', 'Admin\Auth\LoginController@login')->name('admin.login.submit');
   
   Route::get('/password/reset', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
   Route::post('/password/reset', 'Admin\Auth\ForgotPasswordController@reset')->name('admin.password.request');
   Route::get('/password/reset/{token}', 'Admin\Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');
   
   Route::get('/register', 'Admin\Auth\RegisterController@showRegistrationForm')->name('admin.register');
   Route::post('/register', 'Admin\Auth\RegisterController@register')->name('admin.register');
   Route::post('/password/email', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
   
   Route::any('/logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');
   ###############Login/Register End###############
   Route::get('/', 'Admin\Dashboard@index')->name('admin.dashboard');
});