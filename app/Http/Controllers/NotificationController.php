<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Http\Requests\StoreNotificationRequest;
use App\Http\Requests\UpdateNotificationRequest;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function all(Request $request)
    {
        $notis = Notification::where('user_id', '=', auth()->user()->id)->get();
        return view('user.notis', compact('notis'));
    }
}
