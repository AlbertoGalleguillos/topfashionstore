<?php

namespace App;

class Message extends Model
{
    public function attachments() {
        return $this->hasMany(MessagesAttachment::class);
    }
}
