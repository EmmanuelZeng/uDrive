<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function handleLogin(AuthRequest $request){
        $credentials = $request->only([
            'email',
            'password'
        ]);
        if(Auth::attempt($credentials)) {
            return redirect()->route('admin');
        } else {
            return redirect()->back()->with('error_msg', 'Email ou Mot de passe Invalide');
        }
    }
}
