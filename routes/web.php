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
    return view('welcome');
});

Route::post('/loginUser', 'Ajax\LoginUserController@loginUser')->name('loginUser');

Route::get('/table', 'TranslationController@tableShow')->name('table');
Route::get('/language', 'TranslationController@language')->name('language');

Route::any('/read', 'TranslationController@read')->name('read');
Route::post('/create', 'TranslationController@create')->name('create');
