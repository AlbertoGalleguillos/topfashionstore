<?php

namespace App\Http\Controllers;
use App\Http\Requests\UploadRequest;

use Illuminate\Http\Request;
use App\Area;
use App\Constant;
use App\Ticket;
use App\TicketComment;
use App\TicketHistory;
use App\TicketAttachment;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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

    public function store(UploadRequest $request) {

        $this->validate(request(), 
            ['area' => 'required'],
            ['body' => 'required']
        );

        $ticket = Ticket::create([
            'area_id' => request('area'),
            'body' => request('body'),
            'user_id' => auth()->id(),
            'solution' => Constant::DEFAULT_SOLUTION
        ]); 

        TicketHistory::create([
            'ticket_id' => $ticket->id
        ]);

        //Save Attachments
        if ($request->attachments) {
            foreach ($request->attachments as $attachment) {
                $filepath = $attachment->store('ticket');
                $filename = $attachment->getClientOriginalName();
                TicketAttachment::create([
                    'ticket_id' => $ticket->id,
                    'filepath' => $filepath,
                    'filename' => $filename
                ]);
            }
        }

        return redirect('/tickets');
    }

    public function show(Ticket $ticket) {
        return view('tickets.show', compact('ticket'));
    }

    public function addComent() {

        $this->validate(request(), [
            'ticket_id' => 'required',
            'body' => 'required'
        ]);

        TicketComment::create([
            'user_id' => auth()->id(),
            'ticket_id' => request('ticket_id'),
            'body' => request('body'),
        ]);
        return back();
    }

    public function admin() {
        $tickets = Ticket::latest()->get();
        return view('tickets.admin', compact('tickets'));
    }

    public function edit(Ticket $ticket) {
        return view('tickets.edit', compact('ticket'));
    }
}
