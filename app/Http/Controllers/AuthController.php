<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\staff;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class AuthController extends Controller
{
        public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        } else {
            return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
        }
    }
    
    public function showLoginForm()
    {
        return view('movie.login');
    }
    
    public function create(Request $req) {
        
$staff = new staff;
$staff->email = $req->email;
$staff->password = Hash::make($req->password);
$staff->role = $req->role;
$staff->save();
    }
    
    public function about() {
        return view('movie.staff');
    }
    
    public function setRole($role)
{
    session(['role' => $role]);
}
}
