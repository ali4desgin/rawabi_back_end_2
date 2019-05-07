<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{
    //

    public function index(){

        $tickets = Ticket::orderBy("id","desc")->paginate(20);
        return view("BackEnd.Tickets.index",compact("tickets"));
    }
}
