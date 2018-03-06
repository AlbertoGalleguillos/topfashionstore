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
        'name', 'uid', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function messages() {
        return $this->hasMany(Message::class);
    }

    public function tickets() {
        return $this->hasMany(Ticket::class);
    }

    public function notifications() {
        return $this->hasMany(Notification::class);
    }

    public function assign() {
        return $this->hasMany(TicketAssign::class);
    }

    public function send(Message $message) {
        $this->messages()->save($message);
    }

    public function unread() {
        return $this->notifications()->where('read', false)->count();
    }
}