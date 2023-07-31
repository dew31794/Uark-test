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

Route::get('/','HomeController@index')->name('front.index');

// 會員登入
Route::get('login', 'LoginController@index')->defaults('_config', [
    'view' => 'front.login'
])->name('front.login');

Route::post('login', 'LoginController@login')->defaults('_config', [
    'redirect' => 'front.dashboard'
])->name('front.login.store');

// 會員註冊
Route::get('register', 'RegisterController@index')->defaults('_config', [
    'view' => 'front.register'
])->name('front.register');

Route::post('register', 'RegisterController@store')->defaults('_config', [
    'redirect' => 'front.register.success'
])->name('front.register.store');

// 註冊成功畫面
Route::get('success', 'RegisterController@success')->defaults('_config', [
    'view' => 'front.success'
])->name('front.register.success');

// 儀錶板
Route::get('dashboard','DashboardController@index')->defaults('_config', [
    'view' => 'front.dashboard'
])->name('front.dashboard');