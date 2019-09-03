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

Route::get('/', function(){
  return redirect('/login');
});     //to open home page


Route::get('categories/search_categories', 'CategoriesController@search');
Route::get('categories', 'CategoriesController@index');
Route::resource('categories', 'CategoriesController');
Route::post('categorie', 'CategoriesController@store');
// Route::put('categorie', 'CategoriesController@edit');
Route::get('/softdeleted_categories', 'CategoriesController@softDeleted');
Route::get('/restore_categories', 'CategoriesController@restoreSelectedItems');
Route::post('/delete_categories', 'CategoriesController@delete');


Route::get('series/search_series', 'SeriesController@search');
Route::get('series', 'SeriesController@index');
Route::resource('series', 'SeriesController');
Route::post('serie', 'SeriesController@store');
// Route::put('serie', 'SeriesController@edit');
Route::get('/softdeleted_series', 'SeriesController@softDeleted');
Route::get('/restore_series', 'SeriesController@restoreSelectedItems');
Route::post('/delete_series', 'SeriesController@delete');


Route::get('comics/search_comics', 'ComicsController@search');
Route::get('comics', 'ComicsController@index');
Route::resource('comics', 'ComicsController');
Route::post('comics', 'ComicsController@store');
// Route::put('comics', 'ComicsController@edit');
Route::get('/softdeleted_comics', 'ComicsController@softDeleted');
Route::get('/restore_comics', 'ComicsController@restoreSelectedItems');
Route::post('/delete_comics', 'ComicsController@delete');
Route::post('/destroy_comics', 'ComicsController@destroy');


Route::get('action_figures/search_af', 'ActionFiguresController@search');
Route::get('action_figures', 'ActionFiguresController@index');
Route::resource('action_figures', 'ActionFiguresController');
Route::post('action_figures', 'ActionFiguresController@store');
Route::get('/softdeleted_af', 'ActionFiguresController@softDeleted');
Route::get('/restore_af', 'ActionFiguresController@restoreSelectedItems');
Route::post('/delete_af', 'ActionFiguresController@delete');


// Route::view('permissions', 'permissions');
Route::view('create_user', 'create_user');
Route::view('data_management', 'data_management');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/employees', 'UserController@indexEmployee')->middleware('checkrole');
Route::resource('/super_admin', 'SuperAdminController');


Route::get('users_list/search_users', 'UserController@search');
Route::get('users_list', 'UserController@index');
Route::resource('/users_list', 'UserController');
Route::post('users_list', 'UserController@store');
Route::get('/softdeleted_users', 'UserController@softDeleted');
Route::get('/restore_user', 'UserController@restoreSelectedItems');
Route::post('/delete_users', 'UserController@delete');
Route::post('/forcedelete_user', 'UserController@destroy');


Route::get('/changePassword','UserController@showChangePasswordForm');
