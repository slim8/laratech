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
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('questions', 'QuestionsController');
Route::resource('themes', 'ThemesController');
Route::resource('reponses', 'ReponsesController');
Route::post('themes/getscore','ThemesController@calcul');

Route::get('/dashboard', 'DashboardController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
