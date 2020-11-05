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

Route::middleware(['cors', 'json.response', 'auth:api'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['cors', 'json.response']], function () {

    // jobseeker routes
    Route::post('/login', 'App\Http\Controllers\Auth\ApiAuthController@login')->name('login.jobseekers');
    Route::post('/register', 'App\Http\Controllers\Auth\ApiAuthController@register')->name('register.jobseekers');
    Route::post('/logout', 'App\Http\Controllers\Auth\ApiAuthController@logout')->name('logout.jobseekers');

    //employer routes
    Route::post('/employer-login', 'App\Http\Controllers\Auth\EmployerAuthController@login')->middleware('api.employers')->name('login.employers');
    Route::post('/employer-register', 'App\Http\Controllers\Auth\EmployerAuthController@register')->middleware('api.employers')->name('register.employers');
    Route::post('/employer-logout', 'App\Http\Controllers\Auth\EmployerAuthController@logout')->middleware('api.employers')->name('logout.employers');

    //admin routes
    Route::post('/admin-login', 'App\Http\Controllers\Auth\AdminAuthController@login')->middleware('api.admins')->name('login.admins');
    Route::post('/admin-logout', 'App\Http\Controllers\Auth\AdminAuthController@logout')->middleware('api.admins')->name('logout.admins');
    Route::get('/admin-login', 'App\Http\Controllers\Auth\AdminAuthController@login')->middleware('api.admins')->name('login.admins');
    Route::get('/admin-check-auth', 'App\Http\Controllers\Auth\AdminAuthController@checkAuth');
    //blog routes
    Route::resource('categories', 'App\Http\Controllers\Admin\CategoryController')->middleware('api.admins');
    Route::resource('posts', 'App\Http\Controllers\Admin\PostsController')->middleware('api.admins');
    Route::resource('tags', 'App\Http\Controllers\Admin\TagsController')->middleware('api.admins');


    // Website route
    Route::get('/{path?}', function () {
        return view('website');
    })->where('path', '[^admin]*');

    // Admin route
    Route::get('/admin/{path?}', function () {
        return view('admin');
    })->where('path', '.*');
});
