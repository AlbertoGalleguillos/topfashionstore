<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Constant;
use App\Notification;

class NotificationController extends Controller {

    public function index() {
        $notifications = auth()->user()->notifications()->take(50)->latest()->get();
        $message = Constant::NOTIFICATION_DEFAULT;  
        return view('notifications.index', compact('notifications','message'));
    }

    public function read(Notification $notification) {
        $notification->read = true;
        $notification->save();
        return redirect($notification->url);
    }
}
