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

Route::get('/', 'MainController@landing');

Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');
Route::get('logout', 'AuthController@logout');

Route::resource('question', 'PertanyaanController');
Route::post('answer/{question}', 'JawabanController@store');
Route::resource('answer', 'JawabanController')->only(['edit', 'update', 'destroy']);

Route::get('best-answer/{answer}', 'MainController@bestAnswer');
Route::get('vote/{type}/{id}/{vote_type}', 'MainController@vote');
Route::post('comment', 'MainController@comment');
Route::delete('comment/{comment}', 'MainController@deleteComment');
Route::get('tag/{tag}', 'MainController@tagSearch');
Route::post('search', 'MainController@search');