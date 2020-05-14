<?php

namespace App\Http\Controllers;

use App\Events\NotifyAdminEvent;
use App\Models\Post;
use App\Models\User;
use App\Notifications\NotifyAdminNotificaton;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'post' => 'required|string',
        ]);
        
        $post = new Post();
        $post->savePost($request, $post);
        
        event(new NotifyAdminEvent(Auth::user()));
        $users = User::where("id", "!=", Auth::user()->id)->get();
        Notification::send($users, new NotifyAdminNotificaton());
        
        session()->flash('status', 'Post create successfully');
        return redirect()->back();
    }

    public function notifications()
    {
        return view("layouts.notification");

    }
    public function markAsRead($nId)
    {
        Auth::user()->unreadNotifications->where("id", $nId)->markAsRead();
        Auth::user()->notifications->where("id", $nId)->delete();
        return back();

    }
    public function markAsAllRead()
    {
        Auth::user()->unreadNotifications->markAsRead();
        Auth::user()->notifications()->delete();
        return back();

    }
}
