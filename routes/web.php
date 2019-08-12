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
    return view('login');
});

Route::get('/main', 'MainController@index');

Route::post('/main/checklogin', 'MainController@checklogin');
Route::post('/main/createUser', 'MainController@createUser');
Route::post('/main/createSala', 'MainController@createSala');

Route::get('main/dashboard', 'MainController@successlogin');
Route::get('main/logout', 'MainController@logout');

Route::post('main/deleteSala', 'MainController@deleteSala');
Route::post('main/alteraSala', 'MainController@alteraSala');
Route::post('main/alteraSalaBanco', 'MainController@alteraSalaBanco');