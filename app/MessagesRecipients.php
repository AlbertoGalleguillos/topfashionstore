<?php

namespace App;

class MessagesRecipients extends Model
{
    public function message() {
        return $this->belongsTo(Message::class);
    }
}
