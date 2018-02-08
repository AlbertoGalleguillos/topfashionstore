<?php

namespace App;

class ListsUser extends Model
{
    public function list() {
        return $this->belongsTo(Lists::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
