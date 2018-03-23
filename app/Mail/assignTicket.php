<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class assignTicket extends Mailable
{
    use Queueable, SerializesModels;

    public $ticketId;
    public $url;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($ticketId, $url)
    {
        $this->ticketId = $ticketId;
        $this->url = url(config('app.url').$url);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.assignTicket')
                    ->subject('El Requerimiento - N° ' . $this->ticketId. ' ha sido asignado a usted');
                    //->action('Ver Requerimiento', url(config('app.url').route('tickets')));
    }
}
