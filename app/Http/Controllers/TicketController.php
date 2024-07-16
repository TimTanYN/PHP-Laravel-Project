<?php

namespace App\Http\Controllers;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function index(){
     $ticket = Ticket::all();
     return view('Ticket.ShowTicketList', ['ticket' => $ticket]);
        
    }
    
}
