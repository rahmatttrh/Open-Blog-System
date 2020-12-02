<?php

use Illuminate\Support\Facades\Route;



Route::get('search', 'SearchController@post')->name('search.posts');
Route::get('/about', 'PageController@about')->name('about');
Route::get('/mypost', 'PageController@profile')->name('mypost');

Route::get('/posts', 'PostController@index')->name('posts.index');


Route::middleware('auth')->group(function () {
	Route::get('/posts/create', 'PostController@create')->name('posts.create');
	Route::post('/posts/store', 'PostController@store');
	Route::get('/posts/{post:slug}/edit', 'PostController@edit');
	Route::patch('/posts/{post:slug}/edit', 'PostController@update');
	Route::delete('/posts/{post:slug}/delete', 'PostController@destroy');
});


Route::get('/posts/{post:slug}', 'PostController@show');

Route::get('/categories/{category:slug}', 'CategoryController@show');
Route::get('/tags/{tag:slug}', 'TagController@show');



Auth::routes();

Route::get('/', 'PostController@index')->name('posts.index');
