<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@home');

Route::get('faq', function () {
    return view('front.faq');
});

Route::get('profile', 'UserController@profile')->middleware('auth');

Route::get('logout', 'Auth\LoginController@logout')->middleware('auth');

Route::post('updateAvatar', 'UserController@updateAvatar')->middleware('auth');

Route::get('images/{filename}', 'UserController@getImage');

Route::group(['prefix' => 'admin'], function () {

    Route::resource('market', 'MarketController');
    Route::resource('product', 'ProductController');
});

Auth::routes();
