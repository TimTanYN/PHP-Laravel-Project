<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hall;

class HallController extends Controller
{
    public function index(){
       $hall = Hall::all();
     
        return view('movie.hall')->with('hall', $hall);  
    }
}
