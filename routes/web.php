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

Route::get('profile', 'UserController@profile');

Route::get('logout', 'Auth\LoginController@logout');

Route::post('updateAvatar', 'UserController@updateAvatar');

Route::get('images/{filename}', 'UserController@getImage');

Route::resource('mercado', 'MarketController');

Auth::routes();
