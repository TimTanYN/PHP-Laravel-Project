<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
    
   public function index()
   {
       return view('login.index');
   }
   
   public function verifylogin(Request $req)
   { 
       session()->flush();
      $req->validate([
          'staff_id' => 'required',
          'password' => 'required'
      ]);
      
      $staff_id = $req->get('staff_id');
      $password = $req->get('password');
       $staff =  Staff::where('staff_id',$staff_id)->get();
      if(Auth::guard('staff')->attempt(['staff_id' => $staff_id, 'password' => $password]))
      {
         
        
         foreach($staff  as $s){
              session(['role' => $s->position]);
         }
         
          $role = session()->get('role');
         echo $role;
          return view ('backendNavigation');
      }
      else {
          return redirect()->back()->withInput()->withErrors(['login' => 'Incorrect staff ID or password']);
      }
   } 
   
   public function register()
   {
       
       return view('login/register');
   }
   
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $email = $request->get('email');
        if (Auth::guard('customer')->attempt($credentials)) {
         $customer =  Customer::where('email',$email)->get();
         foreach($customer  as $c){
              session(['customerId' => $c->customer_id]);
         }
           return redirect()->route('home');

        } else {
            // authentication failed, redirect back to the login form
            return redirect()->back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
    }
    
    public function frontendLogin(){
        return view('login.customerLogin');
    }
}
