<?php

use Illuminate\Http\Request;
use App\User;
use App\Lists;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

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

Route::get('/search_recipient', function(){
    $query = Input::get('query');
    $lists = DB::table('lists')->where('name', 'like', '%'.$query.'%')->select('name');
    $users = DB::table('users')->where('name', 'like', '%'.$query.'%')->select('name')->union($lists)->get();
    return response()->json($users);
});

Route::get('/search_user', function(){
    $query = Input::get('query');
    $users = User::where('name','like','%'.$query.'%')->get();
    return response()->json($users);
});


