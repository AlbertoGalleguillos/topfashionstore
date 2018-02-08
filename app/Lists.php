<?php

namespace App;

class Lists extends Model
{
    public function listsUsers() {
        return $this->hasMany(ListsUser::class);
    }
}
