<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadRequest;
use App\Message;
use App\MessagesAttachment;
use App\MessagesRecipients;
use App\User;
use App\Lists;
use JavaScript;

use Illuminate\Support\Facades\DB;

class MessagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inbox(){
        $messages = Message::getInbox();
        return view('messages.inbox', compact('messages'));
    }

    public function index(){
        return view('messages.index');
    }


    public function show(Message $message){
        return view('messages.show', compact('message'));
    }

    public function create($reply='', $replySubject=''){    
        JavaScript::put(compact('reply'));
        return view('messages.create', compact('replySubject'));
    }

    public function reply($reply='', $replySubject=''){
        JavaScript::put(compact('reply'));
        return view('messages.create', compact('replySubject'));
    }

    public function store(UploadRequest $request)
    {
        $this->validate(request(), [
            'recipients' => 'required',
            'subject' => 'required',
            'body' => 'required'
        ]);

        //Save Message
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
        $recipients = explode(',', request(['recipients'][0]));
        if($recipients) {
            foreach ($recipients as $recipient) {
                if($recipient) {
                    $user = User::where('name', trim($recipient))->first();
                    if ($user) {
                        $type_id = 'U'; // User
                    } else {
                        $type_id = 'L'; // List
                        $user = Lists::where('name', trim($recipient))->first();
                    }
                    MessagesRecipients::create([
                        'message_id' => $message->id,
                        'to_id' => $user->id,
                        'type_id' => $type_id
                    ]);
                }
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

    public function delete(){
        // Only checkBoxes in 'on'
        $messages = array_filter(request()->all(), function($var) {
            return($var == 'on');
        });
        foreach ($messages as $key => $value) {
            Message::find($key)->toTrash();
        }
        return back();
    }
}