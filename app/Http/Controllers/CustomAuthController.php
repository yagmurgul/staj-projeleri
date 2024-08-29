<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomAuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }


    public function register(){
        return view('auth.register');
    }


    public function verify(){
        return view('auth.verify');
    }


    public function confirm(){
        return view('auth.passwords.confirm');
    }


    public function email(){
        return view('auth.passwords.email');
    }


    public function reset(){
        return view('auth.passwords.reset');
    }




}
