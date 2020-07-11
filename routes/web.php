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
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::middleware(['auth'])->group(function(){

    Route::get('/posts/admin','PostController@admin');
    Route::get('/posts/show/{post}','PostController@show');
    Route::get('/posts/create','PostController@create');
    Route::post('/posts','PostController@store');
    Route::put('/posts/{post}','PostController@update');
    Route::delete('/posts/{post}','PostController@destory');
    Route::get('/posts/{post}/edit','PostController@edit');
});


Route::get('/posts/{post}','PostController@show');
Route::get('/posts','PostController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
