<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'post' => 'required|string',
        ]);
        
        $post = new Post();
        $post->savePost($request, $post);
        session()->flash('status', 'Post create successfully');
        return redirect()->back();
    }
}
