<?php

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Input;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/search_recipient',function(){
    $query = Input::get('query');
    $users = User::where('name','like','%'.$query.'%')->get();
    return response()->json($users);
});