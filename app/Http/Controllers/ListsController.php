<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lists;
use App\ListsUser;
use App\User;

class ListsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $lists = Lists::all();
        return view('lists.index', compact('lists'));
    }

    public function create(){
        return view('lists.create');
    }

    public function store(Lists $list){
        $this->validate(request(), ['name' => 'required']);
        Lists::create(['name' => request('name')]); 
        return redirect('/lists');
    }

    public function edit(Lists $list){
        //dd($list);  
        return view('lists.edit', compact('list'));
    }

    public function addUser(Lists $list){
        //dd($request->all());
        $users = explode(',', request(['users'][0]));
        if($users) {
            foreach ($users as $userList) {
                if($userList) {
                    $user = User::where('name', trim($userList))->first();
                    ListsUser::create([
                        'lists_id' => $list->id,
                        'user_id' => $user->id
                    ]);
                }
            }
        return back();  
        }
    }

    public function destroy(ListsUser $listUser) {
        //dd($listUser);
        ListsUser::destroy($listUser->id);
        return back();
    }
}
