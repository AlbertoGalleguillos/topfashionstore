<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use App\Role;
use App\Store;
use App\User;


class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function create() {
        $areas = Area::all();
        $stores = Store::all();
        $roles = Role::all();
        return view('users.create', compact('areas','roles','stores'));
    }

    public function edit(User $user) {
        $areas = Area::all();
        $stores = Store::all();
        $roles = Role::all();
        return view('users.edit', compact('areas','roles','stores','user'));
    }

    public function index() {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function store() {

        request()->validate([
            'uid' => 'required',
            'name' => 'required',
            'password' => 'required|confirmed'
        ]);
        
        // Save User
        $user = User::create([
            'uid' => request('uid'),
            'name' => request('name'),
            'email' => request('email'),
            'store_id' => request('store'),
            'area_id' => request('area'),
            'password' => bcrypt(request('password'))
        ]);

        // Save Roles
        if (request('roles')) {
            $user->roles()->attach(request('roles'));
        }
      
        return redirect('/users');
    }

    public function update(User $user) {
        // Update user
        $user->uid = request('uid');
        $user->name = request('name');
        $user->email = request('email');
        $user->store_id = request('store');
        $user->area_id = request('area');
        if (request('password')) {
            request()->validate(['password' => 'confirmed']);
            $user->password = bcrypt(request('password'));
        }
        $user->save();

        // Update Roles
        $user->roles()->sync(request('roles'));

        return redirect('/users');
    }
}
