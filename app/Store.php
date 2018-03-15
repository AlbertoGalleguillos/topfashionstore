<?php

namespace App;

class Store extends Model {
    
    public function users() {
        return $this->HasMany(User::class);
    }
}
