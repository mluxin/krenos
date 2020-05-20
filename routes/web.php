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
Route::get('/trainings/show/{training}', 'TrainingController@show')->name('trainings/show');
Route::get('/trainings/create', 'TrainingController@create')->name('trainings/create');
Route::post('/trainings/store', 'TrainingController@store')->name('trainings/store');
// Sessions routes
Route::get('/sessions', 'SessionController@index')->name('sessions/index');
Route::get('/session/show/{session}', 'SessionController@show')->name('sessions/show');

