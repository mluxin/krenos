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

// Users sessions
Route::get('/users', 'UserController@index')->name('users/index');
Route::get('/user/show/{user}', 'UserController@show')->name('users/show');
// Trainings route
Route::get('/trainings', 'TrainingController@index')->name('trainings/index');
Route::get('/training/show/{training}', 'TrainingController@show')->name('trainings/show');
// Sessions routes
Route::get('/sessions', 'SessionController@index')->name('sessions/index');
Route::get('/session/show/{session}', 'SessionController@show')->name('session/show');
Route::get('/sessions/create', 'SessionController@create')->name('sessions/create');
Route::post('/sessions/store', 'SessionController@store')->name('session/store');

Route::get('/session/edit', 'SessionController@edit')->name('sessions/edit');
Route::post('/session/update', 'SessionController@update')->name('sessions/update');


