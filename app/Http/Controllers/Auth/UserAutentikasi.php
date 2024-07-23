<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserAutentikasi extends Controller
{
    public function index() {
        return view('Auth.login');
    }
    public function loginStore(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $data =[
            'email' => $request->email,
            'password' => $request->password
        ];
    
        if (Auth::attempt($data)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->withErrors(['email' => 'These credentials do not match our records.']);
        }
    }
    public function register() {
        return view('Auth.register');
    }
    public function store(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request['password'])
        ];
        User::create($data);
        return redirect()->route('login.data')->with('success', 'Registration successful!');
    }
    public function logout() {
        Auth::logout();
  
        return redirect()->route('login');
    }
}
