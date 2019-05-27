<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class SessionsController extends Controller
{
    public function create() {
        return view('sessions.create');
    }

    public function store (Request $request){
        $credentials=$this->validate($request, [
            'email'=>'required|email|max:255',
            'password'=>'required'
        ]);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            session()->flash('success','Welcome back!');
            return redirect()->route('users.show',[Auth::user()]);

        } else {
            session()->flash('danger','Sorry, you entered an invalid email or password.');
            return redirect()->back()->withInput();
        }

    }

    public function destroy (){
        Auth::logout();
        session()->flash('success','Successfully logout!');
        return redirect('login');
    }
}
