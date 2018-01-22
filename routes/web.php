<?php

use App\Message;

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

Route::get('/messages/inbox', 'MessagesController@index');
Route::get('/messages/sent', 'MessagesController@sent');
Route::get('/messages/trash', 'MessagesController@trash');
Route::get('/messages/create', 'MessagesController@create');
Route::get('/messages/inbox/{message}', 'MessagesController@show');
Route::post('/messages', 'MessagesController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
