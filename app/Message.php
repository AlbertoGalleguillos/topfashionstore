<?php

namespace App;
use App\User;
use App\Lists;

use Illuminate\Support\Facades\DB;

class Message extends Model
{
    public function attachments() {
        return $this->hasMany(MessagesAttachment::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function recipients() {
        return $this->hasMany(MessagesRecipients::class);
    }

    public function getRecipients() {
        $sw = true;
        foreach ($this->recipients as $recipient){
            if ($recipient->type_id == 'U') { // U -> User
                $model = User::find($recipient->to_id);
            } elseif ($recipient->type_id == 'L'){ // L -> List
                $model = Lists::find($recipient->to_id);
            }
            if ($sw) {
                $recipient_names = $model->name ;
                $sw = false;
            } else {
                $recipient_names =  $recipient_names.", ".$model->name ;
            }
        }
        return $recipient_names;
    }
}
