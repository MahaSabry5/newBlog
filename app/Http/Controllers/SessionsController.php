<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create(){
        return view('sessions.create');
    }

    public function store(){
        //@dd(request()->all());
        $attributes=request() -> validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(!auth()->attempt($attributes)){
            throw ValidationException::withMessages(['email'=> 'Could not be verfied maha']);
        }

        session()->regenerate();//session fixation
        return redirect('/')->with('success','WelcomeBack');

    }
    public function destroy(){
        auth()->logout();
        return redirect('/')->with('success','GoodBye');
    }
}
