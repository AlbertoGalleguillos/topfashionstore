<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class newMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $messageId;
    public $sender;
    public $url;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($messageId, $sender, $url)
    {
        $this->messageId = $messageId;
        $this->sender = $sender;
        $this->url = url(config('app.url').$url);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.message')
                    ->subject('Nuevo Mensaje de ' . $this->sender);
    }
}