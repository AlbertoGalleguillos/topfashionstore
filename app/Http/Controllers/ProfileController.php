<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;

class ProfileController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('profile');
    }

    public function updatePassword(){
        $user = auth()->user();
        if (Hash::check(request('current_password'), $user->password)) {
            $user->password = Hash::make(request('password'));
            $user->setRememberToken(Str::random(60));
            $user->save();
        }
        return back();
    }
}
