<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public function tickets() {
        return $this->HasMany(Ticket::class);
    }
}
