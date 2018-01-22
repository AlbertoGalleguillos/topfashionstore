<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadRequest;
use App\Message;
use App\MessagesAttachment;

class MessagesController extends Controller
{
    public function index(){
        $messages = Message::latest()->get();
        return view('messages.inbox', compact('messages'));
    }

    public function show(Message $message){
        //dd(compact('message'));
        return view('messages.show', compact('message'));
    }

    public function create(){
        return view('messages.create');
    }

    public function store(UploadRequest $request)
    {
        //dd($request->all());


        $this->validate(request(), [
            'from' => 'required',
            'to' => 'required',
            'subject' => 'required',
            'body' => 'required'
        ]);
        
        $message = Message::create(request(['from','to','bcc','subject','body']));

        foreach ($request->attachments as $attachment) {
            $filepath = $attachment->store('attach');
            $filename = $attachment->getClientOriginalName();
            MessagesAttachment::create([
                'message_id' => $message->id,
                'filepath' => $filepath,
                'filename' => $filename
            ]);
        }
    
        // Redirect to index
        return redirect('/messages/inbox');
    }
}