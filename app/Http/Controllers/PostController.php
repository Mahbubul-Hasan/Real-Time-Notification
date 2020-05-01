<?php

namespace App\Http\Controllers;

use App\Events\NotifyAdminEvent;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        
        session()->flash('status', 'Post create successfully');
        return redirect()->back();
    }
}
