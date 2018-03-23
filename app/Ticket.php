<?php

namespace App;

class Ticket extends Model {
    public function area() {
        return $this->belongsTo(Area::class);
    }

    public function attachments() {
        return $this->hasMany(TicketAttachment::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments() {
        return $this->hasMany(TicketComment::class)->latest();
    }

    public function histories() {
        return $this->hasMany(TicketHistory::class);
    }

    public function currentStatus() {
        return $this->histories->last()->status->name;
    }

    public static function byStatus($statusId, $assignId = null, $areaId = null) {
        return static::select('tickets.id', 'body', 'progress', 'tickets.created_at','user_id')
                ->join('ticket_histories', 'tickets.id', '=', 'ticket_histories.ticket_id')
                ->whereRaw('ticket_histories.updated_at = (select max(updated_at) from ticket_histories c
                        where tickets.id = c.ticket_id) and status_id = ?' , $statusId)
                ->when($assignId, function($query) use ($assignId) {
                    return $query->join('ticket_assigns', 'tickets.id', '=', 'ticket_assigns.ticket_id')
                                    ->where('ticket_assigns.user_id', $assignId);
                })
                ->when($areaId, function($query) use ($areaId) {
                    return $query->where('area_id', $areaId);
                })
                ->latest()
                ->get();
    }
}
