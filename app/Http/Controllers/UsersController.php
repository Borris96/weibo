<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UsersController extends Controller
{
    public function create(){
        return view('users.create');
    }
// ******两种方法调用users.show
    public function show(User $user){
        return view('users.show',compact('user'));
    }

    // public function show($id){
    //     return view('users.show')->withUser(User::find($id));
    // }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);
        return;
    }
}
