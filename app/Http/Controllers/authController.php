<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    public function loginPage(){
        return view('login', 
        ['title' => 'Login Page']);
    }

    public function registerPage(){
        return view('register',
        ['title' => 'Register Page']);
    }

    public function register(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|min:3|max:40',
            'email' => 'required|unique:users|email:dns',
            'password' => 'required|min:6|max:12',
            'phone_num' => 'string|required|starts_with:08|unique:users'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        
        User::create($validatedData);

        return redirect(route('loginPage'));
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
