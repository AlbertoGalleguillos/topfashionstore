<?php

namespace App;

class Ticket extends Model
{
    public function area() {
        return $this->belongsTo(Area::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function status() {
        return $this->belongsTo(TicketStatus::class);
    }
}
