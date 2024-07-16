<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class RegisterController extends Controller
{
    public function store(Request $req)
    {
        $req->validate([
            'password' => 'required|min:8|max:100|regex:/^.*(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$/',
            //must contain at least one lowercase letter , one uppercase letter , one digit
            'name' => 'required|max:30',
            'email' => 'required|max:30',
            'phone' => 'required|max:14' 
        ]);
        
        $s = new Customer();
        $s->password = bcrypt($req->password);  
        $s->name   = $req->name;
        $s->email  = $req->email;
        $s->phone = $req->phone;
        $s->save();
        
        return view('login.customerLogin');
    }

    public function index()
    {
       return view('login/register');
    }
}
