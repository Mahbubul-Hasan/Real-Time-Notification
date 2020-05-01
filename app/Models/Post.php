<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    public $guarded = [];
    
    public function user()
    {
        return $this->belongsTo("App\Models\User");
    }
    
    public function savePost($request, $post)
    {
        $post->user_id = Auth::user()->id;
        $post->post = $request->post;
        $post->save();
    }
}
