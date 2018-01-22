<?php

namespace App;

class Message extends Model
{
    public function attachments() {
        return $this->hasMany(MessagesAttachment::class);
    }

    public function recipients() {
        return $this->hasMany(MessagesRecipients::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
