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
    
    Route::resource('posts', 'PostController')->except(['show','index']);
    Route::get('/posts/admin','PostController@admin');
    Route::get('/posts/show/{post}','PostController@showByAdmin');

    Route::resource('categories', 'CategoryController')->except(['show']);
    Route::resource('tags', 'TagController')->only(['index','destory']);
});

Route::get('/posts/{post}','PostController@show');
Route::get('/posts','PostController@index');
Route::get('/posts/category/{category}','PostController@indexWithCategory');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
