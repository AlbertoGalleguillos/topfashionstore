<?php

namespace App;

class TicketAttachment extends Model
{
    public function ticket() {
        return $this->belongsTo(Ticket::class);
    }
}
