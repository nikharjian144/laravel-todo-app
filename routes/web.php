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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'TaskController@index');
Route::get('/tasks', 'TaskController@index');
Route::post("/task", 'TaskController@store');
Route::get("/{id}/complete", 'TaskController@complete');
Route::get("/{id}/in-complete", 'TaskController@inComplete');
Route::get("/{id}/delete", 'TaskController@destroy');