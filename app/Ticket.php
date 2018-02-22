<?php

namespace App;

class Ticket extends Model
{
    public function area() {
        return $this->belongsTo(Area::class);
    }

    public function attachments() {
        return $this->hasMany(TicketAttachment::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments() {
        return $this->hasMany(TicketComment::class);
    }

    public function histories() {
        return $this->hasMany(TicketHistory::class);
    }

    public function currentStatus() {
        return $this->histories->last()->status->name;
    }
}
