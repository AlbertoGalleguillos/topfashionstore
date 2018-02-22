<?php

namespace App;

class TicketHistory extends Model
{
    public function status() {
        return $this->belongsTo(TicketStatus::class);
    }

    public function ticket() {
        return $this->belongsTo(Ticket::class);
    }
}
