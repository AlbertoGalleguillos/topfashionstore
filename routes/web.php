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

Route::get('/dashboard', 'DashboardController@index');

Route::get('/messages', 'MessagesController@index');
Route::get('/messages/inbox', 'MessagesController@inbox');
Route::get('/messages/sent', 'MessagesController@sent');
Route::get('/messages/trash', 'MessagesController@trash');
Route::get('/messages/create', 'MessagesController@create');
Route::get('/messages/create/{reply?}/{reply_subject?}', 'MessagesController@reply');
Route::get('/messages/{message}', 'MessagesController@show');
Route::post('/messages', 'MessagesController@store');
Route::delete('/messages/delete', 'MessagesController@delete');

Route::get('/tickets', 'TicketController@index');
Route::get('/tickets/create', 'TicketController@create');
Route::get('/tickets/{ticket}', 'TicketController@show');
Route::post('/tickets', 'TicketController@store');
Route::post('/tickets/comment', 'TicketController@addComent');

Route::get('/notifications', 'NotificationController@index');
Route::post('/notifications/{notification}', 'NotificationController@read');



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



Route::get('/meeting', function (){
    return view('meeting');
});

Route::get('/features', function (){
    return view('features');
});

Route::get('/profile', function (){
    return view('profile');
});

Route::get('/new', function (){
    return view('layouts.new_master');
});

Route::get('/form', function (){
    return view('form');
});