<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadRequest;
use App\Message;
use App\MessagesAttachment;
use App\MessagesRecipients;


class MessagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $messages = \DB::table('messages_recipients')
            ->select('messages.*','users.name as from')
            ->join('messages', 'messages.id', 'messages_recipients.message_id')
            ->join('users', 'messages.user_id', 'users.id')
            ->where('messages_recipients.to_id',auth()->id())
            ->latest()
            ->get();

        return view('messages.inbox', compact('messages'));
    }

    public function show(Message $message){
        return view('messages.show', compact('message'));
    }

    public function create(){
        return view('messages.create');
    }

    public function store(UploadRequest $request)
    {
        $this->validate(request(), [
            'to_ids' => 'required',
            'subject' => 'required',
            'body' => 'required'
        ]);
        
        auth()->user()->send(
            $message = new Message(request(['subject','body']))
        );

        //Save Attachments
        if ($request->attachments) {
            foreach ($request->attachments as $attachment) {
                $filepath = $attachment->store('attach');
                $filename = $attachment->getClientOriginalName();
                MessagesAttachment::create([
                    'message_id' => $message->id,
                    'filepath' => $filepath,
                    'filename' => $filename
                ]);
            }
        }

        //Save Recipients
        $recipients = request(['to_ids']);
        $recipients = explode(',', $recipients['to_ids']);
        if($recipients) {
            foreach ($recipients as $recipient) {
                MessagesRecipients::create([
                    'message_id' => $message->id,
                    'to_id' => $recipient,
                ]);
            }
        }

        // Redirect to index
        return redirect('/messages/inbox');
    }

    public function sent(){
        $messages = Message::latest()
            ->where([['user_id', auth()->id()],
                     ['deleted', false]])
            ->get();
            

        return view('messages.sent', compact('messages'));
    }

    public function trash(){
        $messages = Message::latest()
            ->where([['user_id', auth()->id()],
                     ['deleted', true]])
            ->get();
            

        return view('messages.trash', compact('messages'));
    }
}