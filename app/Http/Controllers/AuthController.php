<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function handleLogin(AuthRequest $request){
        //dd($request->only(['email','password']));
        $credentials = $request->only(['email','password']);
        if(Auth::attempt($credentials)) {
            if(auth()->user()->role->name === 'admin'){
                return redirect()->route('admin');
            }
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with('error_msg', 'Email ou Mot de passe Invalide');
        }
    }

    public function register(){
        $roles = Role::all();
        return view('auth.register', compact('roles'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'min:8', 'string'],
            'role_id' => ['required']
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ]);
        event(new Registered($user));
        Auth::login($user);
        if(auth()->user()->role->name === 'admin'){
            return redirect()->route('admin');
        }
        return redirect()->route('dashboard');
    }
}
