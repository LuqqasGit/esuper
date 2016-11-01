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

Route::post('/updateAvatar', 'UserController@updateAvatar');

Route::get('images/{filename}', 'UserController@getImage');

Route::get('/logout', function() {
  Auth::logout();
  return redirect('/');
});

Route::get('/faq', function () {
    return view('front.faq');
});

Route::get('/profile', function () {
    return view('front.profile');
});

Auth::routes();
