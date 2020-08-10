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

Route::get('/', 'UserController@index');
Route::get('/article', 'UserController@article')->name('article');
Route::get('/article/{slug}', 'UserController@detail_article')->name('detail_article');
Route::post('/article/comment', 'UserController@comment')->name('comment_article');


Route::get('/admin/home', 'HomeController@index')->name('home.index');

Route::get('/admin/article', 'ArticleController@index')->name('article.index');
Route::get('/admin/article/add', 'ArticleController@add')->name('article.add');
Route::post('/admin/article/save', 'ArticleController@save')->name('article.save');
Route::post('/admin/article/image', 'ArticleController@postImage')->name('post.image');
Route::match(['get', 'post'], '/admin/article/{id}/change_status', 'ArticleController@change_status')->name('article.change_status');
Route::delete('/admin/article/{id}/delete', 'ArticleController@delete');
Route::get('/admin/article/edit/{id}', 'ArticleController@edit');
Route::put('/admin/article/update/{id}', 'ArticleController@update');


Route::get('/admin/author', 'AuthorController@index')->name('author.index');
Route::match(['get', 'post'], '/admin/author/{id}/change_status', 'AuthorController@change_status')->name('change_status');
Route::delete('/admin/author/{id}/delete', 'AuthorController@delete');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
