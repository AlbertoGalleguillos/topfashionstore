<?php

namespace App;

class Lists extends Model
{
    public function listUsers() {
        return $this->hasMany(ListsUser::class);
    }
}
