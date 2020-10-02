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

//back admin page

Route::get('/admin/blog', 'admin\PostController@index')->name('blog.index');
Route::get('/admin/blog/create', 'admin\PostController@create')->name('post.create');
Route::post('/admin/blog', 'admin\PostController@store')->name('post.store');
//enviamos como parametro un objeto de la base de datos
Route::get('/admin/blog/{post}', 'admin\PostController@show')->name('post.show');
Route::get('/admin/blog/{post}/edit', 'admin\PostController@edit')->name('post.edit');
Route::patch('/admin/blog/{post}', 'admin\PostController@update')->name('post.update');
Route::delete('/admin/blog/{post}', 'admin\PostController@destroy')->name('post.destroy');



//front usuarios
Route::get('/blog','HomeblogController@index')->name('post.home.page');
Route::get('/blog/{slug}', ['as' => 'inicio.show.inicio', 'uses' => 'HomeblogController@show']);
//fornt categoria
Route::get('/blog/category/{slug}', 'HomeblogController@category')->name('category.show');


Auth::routes();

Route::get('/admin', 'admin\HomeController@index')->name('home');
