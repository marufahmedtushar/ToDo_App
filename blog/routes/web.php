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

Route::get('/', 'IndexController@index');

Route::group(['middleware' => ['auth','user']],function() {
Route::put('/taskstore','IndexController@taskstore');
Route::delete('/taskdelete/{id}','IndexController@taskdelete');
Route::put('/taskcomplete/{id}','IndexController@taskcomplete');
});