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
Route::any('/', function () {
    return redirect()->route('task');
});

Route::get('/auth/login', 'Auth@login')->name('auth-login');
Route::get('/auth/register', 'Auth@register')->name('auth-register');
Route::get('/auth/logout-process', 'Auth@logout_process')->name('auth-logout-process');
Route::post('/auth/login-process', 'Auth@login_process')->name('auth-login-process');
Route::post('/auth/register-process', 'Auth@register_process')->name('auth-register-process');


Route::get('/task', 'Task@index')->name('task');
