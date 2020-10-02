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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin/blog', 'admin\PostController@index')->name('blog.index');
Route::get('/admin/blog/create', 'admin\PostController@create')->name('post.create');
Route::post('/admin/blog', 'admin\PostController@store')->name('post.store');
// Route::get('/admin/blog/{blog}', 'admin\PostController@show')->name('post.show');
Route::get('/admin/blog/{id}/edit', 'admin\PostController@edit')->name('post.edit');


Route::get('/blog','HomeblogController@index')->name('post.home.page');

Route::get('/blog/{slug}', ['as' => 'inicio.show.inicio', 'uses' => 'HomeblogController@show']);


Auth::routes();

Route::get('/admin', 'admin\HomeController@index')->name('home');
