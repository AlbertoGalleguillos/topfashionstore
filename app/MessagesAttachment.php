<?php

namespace App;

class MessagesAttachment extends Model
{
    public function message() {
        return $this->belongsTo(Message::class);
    }
}
