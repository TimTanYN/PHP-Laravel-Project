<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeControler extends Controller
{
    public function index(){
        return view('movie.home');
    }
    
    public function about(){
        return view('about');
    }
    
    public function back(){
        return view ('backendNavigation');
    }
}
