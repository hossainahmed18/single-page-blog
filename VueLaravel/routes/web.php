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



Auth::routes();

Route::get('/', 'Frontend@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('posts', 'PostController@all_post')->name('all_post');
//Route::get('/{anypath}', 'HomeController@index')->where('path','.*');


Route::post('/add-category','CategoryController@add_category');
Route::get('/category','CategoryController@all_category');
Route::get('/category/{id}','CategoryController@delete_category');
Route::get('/editcategory/{id}','CategoryController@edit_category');
Route::post('/update-category/{id}','CategoryController@update_category');



Route::post('/add-post','PostController@add_post');
Route::get('/post','PostController@all_post');
Route::get('/editpost/{id}','PostController@edit_post');
Route::post('/update-post/{id}','PostController@update_post');
Route::post('/view-post/{id}','PostController@view_post');
Route::get('/delete-post/{id}','PostController@delete_post');


//Blog Controller
Route::get('/blogpost','BlogController@get_blog_post')->name('all_blog_post');
Route::get('/single-post/{id}','BlogController@singlePost')->name('single_post');
Route::get('/user-categories','BlogController@userCategories')->name('user_categories');
Route::get('/category-post/{categoryId}','BlogController@CategoryPost')->name('category_post');
Route::get('/search','BlogController@SearchPost')->name('search_post');
Route::get('/latestpost','BlogController@LatestPost')->name('latest_post');
Route::get('/delete-category/{ids}','BlogController@checkboxDelete')->name('checkbox_delete');
