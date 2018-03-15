<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uid', 'name', 'email', 'store_id', 'area_id', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function assign() {
        return $this->hasMany(TicketAssign::class);
    }

    public function area() {
        return $this->belongsTo(Area::class);
    }

    public function hasRole($role) {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

    public function messages() {
        return $this->hasMany(Message::class);
    }

    public function notifications() {
        return $this->hasMany(Notification::class);
    }

    public function tickets() {
        return $this->hasMany(Ticket::class);
    }

    public function roles() {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function send(Message $message) {
        $this->messages()->save($message);
    }

    public function store() {
        return $this->belongsTo(Store::class);
    }

    public function unread() {
        return $this->notifications()->where('read', false)->count();
    }
}