<?php

namespace App;

class TicketStatus extends Model
{
    public function tickets() {
        return $this->HasMany(Ticket::class);
    }
}
