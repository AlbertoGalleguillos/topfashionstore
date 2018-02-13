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

Route::get('/messages/inbox', 'MessagesController@inbox');
Route::get('/messages/sent', 'MessagesController@sent');
Route::get('/messages/trash', 'MessagesController@trash');
Route::get('/messages/create', 'MessagesController@create');
Route::get('/messages/create/{reply?}/{reply_subject?}', 'MessagesController@reply');
Route::get('/messages/{message}', 'MessagesController@show');
Route::get('/messages', 'MessagesController@index');

Route::post('/messages', 'MessagesController@store');

Route::get('/dashboard', 'DashboardController@index');

Route::get('/autocomplete', function (){
    return view('autocomplete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/lists', 'ListsController@index');
Route::get('/lists/create', 'ListsController@create');
Route::get('/lists/{list}/edit', 'ListsController@edit');

Route::post('/lists', 'ListsController@store');
Route::post('/lists/{list}/addUser', 'ListsController@addUser');
Route::delete('/lists/removeUser/{listUser}', 'ListsController@destroy');

Route::get('/admin', function (){
    return view('admin');
});

Route::get('/tickets', function (){
    return view('tickets');
});

Route::get('/meeting', function (){
    return view('meeting');
});

Route::get('/features', function (){
    return view('features');
});

Route::get('/profile', function (){
    return view('profile');
});