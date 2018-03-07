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

Route::get('/profile', 'ProfileController@index');
Route::post('/profile', 'ProfileController@updatePassword');

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
Route::get('/tickets/admin', 'TicketController@admin');
Route::get('/tickets/assign', 'TicketController@assign');
Route::get('/tickets/edit/{ticket}', 'TicketController@edit');
Route::get('/tickets/create', 'TicketController@create');
Route::get('/tickets/{ticket}', 'TicketController@show');
Route::post('/tickets', 'TicketController@store');
Route::post('/tickets/comment', 'TicketController@addComent');
Route::post('/tickets/edit/{ticket}', 'TicketController@update');


Route::get('/notifications', 'NotificationController@index');
Route::post('/notifications/{notification}', 'NotificationController@read');

Route::get('/admin', 'AdminController@index');
Route::get('/meeting', 'AdminController@meeting');
Route::get('/features', 'AdminController@features');

Route::get('/home', 'MessagesController@inbox')->name('home');

Route::get('/lists', 'ListsController@index');
Route::get('/lists/create', 'ListsController@create');
Route::get('/lists/{list}/edit', 'ListsController@edit');
Route::post('/lists', 'ListsController@store');
Route::post('/lists/{list}/addUser', 'ListsController@addUser');
Route::delete('/lists/removeUser/{listUser}', 'ListsController@destroy');