<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

 // jobseeker routes
 Route::post('/login', 'App\Http\Controllers\Auth\ApiAuthController@login')->name('login.jobseekers');
 Route::post('/register','App\Http\Controllers\Auth\ApiAuthController@register')->name('register.jobseekers');
 Route::post('/logout', 'App\Http\Controllers\Auth\ApiAuthController@logout')->name('logout.jobseekers');

 //employer routes
 Route::post('/employer-login', 'App\Http\Controllers\Auth\EmployerAuthController@login')->middleware('api.employers')->name('login.employers');
 Route::post('/employer-register','App\Http\Controllers\Auth\EmployerAuthController@register')->middleware('api.employers')->name('register.employers');
 Route::post('/employer-logout', 'App\Http\Controllers\Auth\EmployerAuthController@logout')->middleware('api.employers')->name('logout.employers');

 //admin routes
  Route::post('/admin-login', 'App\Http\Controllers\Auth\AdminAuthController@login')->middleware('api.admins')->name('login.admins');
  Route::post('/admin-logout', 'App\Http\Controllers\Auth\AdminAuthController@logout')->middleware('api.admins')->name('logout.admins');

