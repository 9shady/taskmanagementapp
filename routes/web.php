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

Route::get('/','PagesController@index');
Route::get('/filtertasks/{id}','PagesController@filterTasks');
Route::post('/search','PagesController@search');
Route::get('/addtask','PagesController@addTask');
Route::post('/storetask','PagesController@storetask');
Route::get('/showtask/{id}','PagesController@showTask');
Route::get('/changestatus/{id}/{status}','PagesController@changestatus');
Route::get('/edit/{id}','PagesController@editTask');
Route::post('/updatetask/{id}','PagesController@updateTask');
Route::delete('/destroy/{id}','PagesController@destroy');