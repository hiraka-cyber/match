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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/index', 'indexController@index')->name('index');
Route::post('/add','indexController@add')->name('add');
Route::get('/result/ajax','indexController@getData');


Route::get('/etube', 'EditController@index')->name('etube');
Route::get('/etube/add', 'EditController@add')->name('etube-add');

Route::get('/tuber', 'PostController@index')->name('tuber');
Route::get('/tuber/add', 'PostController@add')->name('tuber-add');

Route::post('/etube', 'EditController@store')->middleware('auth');
Route::post('/tuber', 'PostController@store')->middleware('auth');
