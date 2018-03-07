<?php

namespace App\Http\Controllers;
use App\Http\Requests\UploadRequest;

use Illuminate\Http\Request;
use App\Area;
use App\Constant;
use App\Notification;
use App\Ticket;
use App\TicketAssign;
use App\TicketAttachment;
use App\TicketComment;
use App\TicketHistory;
use App\TicketStatus;
use App\User;

class TicketController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $tickets = auth()->user()->tickets()->take(50)->latest()->get();
        if ($tickets->isEmpty()) 
            $tickets = 'Todavía no has ingresado requerimientos, crea uno utilizando el botón que se encuentra en la esquina inferior derecha';
        return view('tickets.index', compact('tickets'));
    }

    public function create() {
        return view('tickets.create');
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
        $areaId = auth()->user()->area_id;
        $ticketsInbox = Ticket::byStatus(1, null, $areaId); // En Espera
        $ticketsDetained = Ticket::byStatus(2, null, $areaId); // Detenido
        $ticketsInProgress = Ticket::byStatus(3, null, $areaId); // En Progreso
        $ticketsFinished = Ticket::byStatus(4, null, $areaId); // Terminado
        $messageDefault = Constant::TICKET_ADMIN_DEFAULT;
        return view('tickets.admin', compact('ticketsInbox','ticketsDetained','ticketsInProgress','ticketsFinished','messageDefault'));
    }

    public function assign() {
        $ticketsDetained = Ticket::byStatus(2, auth()->id()); // Detenido
        $ticketsInProgress = Ticket::byStatus(3, auth()->id()); // En Progreso
        $ticketsFinished = Ticket::byStatus(4, auth()->id()); // Terminado
        $messageDefault = Constant::TICKET_ADMIN_DEFAULT;
        return view('tickets.assign', compact('ticketsInbox','ticketsDetained','ticketsInProgress','ticketsFinished','messageDefault'));
    }

    public function edit(Ticket $ticket) {
        return view('tickets.edit', compact('ticket'));
    }

    public function update(Ticket $ticket) {
        //dd(request()->all());
        // Finish Ticket
        $progress = request('progress');
        $solution = request('solution');
        if (($progress == 100) && (isset($solution))) {
            TicketHistory::create([
                'ticket_id' => $ticket->id,
                'status_id' => 4 // Terminado
            ]);
            Notification::create([
                'user_id' => auth()->id(),
                'url' => '/tickets/' . $ticket->id,
                'body' => 'Su requerimiento ha sido Terminado'
            ]);
            $ticket->solution = $solution;
            $ticket->progress = $progress;
            $ticket->save();
        } else {
            redirect(back())->withErrors('Para cerrar un requerimiento su progreso debe ser 100% y debe ingresar una solución');
        }

        // Add Coment
        $comment = request('comment');
        if (isset($comment)) {
            TicketComment::create([
                'user_id' => auth()->id(),
                'ticket_id' => $ticket->id,
                'body' => $comment
            ]);
            Notification::create([
                'user_id' => auth()->id(),
                'url' => '/tickets/' . $ticket->id,
                'body' => Constant::NOTIFICATION_NEW_COMMENT
            ]);
        }

        // Assign To ...
        $assign = request('assign');
        if (isset($assign)) {
            $message = 'Su requerimiento ha sido asignado a ' . $assign;
            TicketComment::create([
                'user_id' => auth()->id(),
                'ticket_id' => $ticket->id,
                'body' => $message
            ]);
            TicketHistory::create([
                'ticket_id' => $ticket->id,
                'status_id' => 3 // En progreso
            ]);
            Notification::create([
                'user_id' => auth()->id(),
                'url' => '/tickets/' . $ticket->id,
                'body' => $message
            ]);
            $userAssign = User::where('name',trim($assign))->first();
            TicketAssign::create([
                'ticket_id' => $ticket->id,
                'user_id' => $userAssign->id
            ]);
        }

        // Update Area
        $area = request('area');
        if ($area != $ticket->area_id) {
            $ticket->area = $area;
            $ticket->save();
        }

        return back();
    }
}
