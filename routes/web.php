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

Route::get('/','HomeController@index');
Route::get('Life','HomeController@life');
Route::get('People','HomeController@people');
Route::get('Growing-Up','HomeController@growingup');
Route::get('Books','HomeController@books');
Route::get('Travel','HomeController@travel');
Route::get('Relationships','HomeController@relationships');
Route::get('Bonfire','HomeController@bonfire');
Route::get('About-Grey-Era','HomeController@about');

//Route to post comment
Route::post('Read-Blog/submitcomments','HomeController@submitcomments');


Route::get('Read-Blog/Read','HomeController@read');


Route::get('admin','AdminController@index');
Route::get('admin/newblog','AdminController@newblog');
Route::get('admin/New-Title','AdminController@newblogtitle');
Route::post('admin/deletepost','AdminController@deletepost');
Route::get('/continueedit','AdminController@continueedit');
Route::post('admin/newtitle','AdminController@newtitle');
Route::post('newparagraph','AdminController@newparagraph');
Route::post('admin/newdocument','AdminController@newdocument');
Route::get('admin/editcomplete','AdminController@editcomplete');
Route::get('admin/editblog','AdminController@editblog');
Route::post('storeimage','AdminController@storeimage');

Route::get('admin/comments','AdminController@comments');

Route::get('admin/blogs','AdminController@blogs');
Route::get('testing','AdminController@testing');

Route::get('admin/gallery','AdminController@gallery');


Route::get('admin/categories','AdminController@categories');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
