<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seat;

class SeatController extends Controller
{
    public function index(){
       $seat = Seat::all();
     
        return view('movie.seat')->with('seat', $seat);  
    }
}
