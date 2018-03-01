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

    public static function getInbox(){
        //TODO: Refactor to Message method: $messages->getInbox
        $listMessages = DB::table('messages')
            ->select('messages.id', 'users.name as from', 'messages.subject', 'messages.body', 'messages.created_at')
            ->join('users', 'messages.user_id', 'users.id')
            ->join('messages_recipients', 'messages.id', 'messages_recipients.message_id')
            ->join('lists_users', 'messages_recipients.to_id', 'lists_users.lists_id')
            ->where([['type_id','L'], // L -> Lists
                    ['deleted',false],
                    ['lists_users.user_id', auth()->id()]]);

        $messages = DB::table('messages')
            ->select('messages.id', 'users.name as from', 'messages.subject', 'messages.body', 'messages.created_at')
            ->join('users', 'users.id', 'messages.user_id')
            ->join('messages_recipients', 'messages_recipients.message_id', 'messages.id')
            ->where([['type_id','U'], // U -> Users
                    ['deleted',false],
                    ['messages_recipients.to_id', auth()->id()]])
            ->union($listMessages)
            ->latest()
            ->get();

        return $messages;
    }

    public function getRecipients() {
        $recipient_names = ''; // To get null results
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

    public function toTrash(){
        $this->deleted = true;
        return $this->save();
    }
}
