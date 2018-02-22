<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use App\Ticket;

class TicketController extends Controller
{
    public function index() {
        $tickets = auth()->user()->tickets()->take(50)->latest()->get();
        if ($tickets->isEmpty()) 
            $tickets = 'Todavía no has ingresado requerimientos, crea uno utilizando el botón que se encuentra en la esquina inferior derecha';
        return view('tickets.index', compact('tickets'));
    }


    public function create() {
        $areas = Area::all();
        return view('tickets.create', compact('areas'));
    }

    public function store() {
        $this->validate(request(), 
            ['area' => 'required'],
            ['body' => 'required']
        );
        Ticket::create([
            'area_id' => request('area'),
            'body' => request('body'),
            'user_id' => auth()->id()
        ]); 

        return redirect('/tickets');
    }
}
