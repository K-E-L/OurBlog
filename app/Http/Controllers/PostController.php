<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function create()
    {
        $this->validate(request(), [
            'body' => 'required',
        ]);

        $post = Post::create([
            'body' => request('body'),
            'creator_id' => Auth::User()->id,
        ]);

        return redirect('/');        
    }

    public function destroy(Post $post)
    {
        // authentication: backend
        if (Auth::User()->id !== $post->creator->id)
            return redirect('/');
        
        Post::destroy($post->id);

        return redirect('/');
    }
    
    public function edit(Post $post)
    {
        $this->validate(request(), [
            'body' => 'required',
        ]);

        // authentication: backend
        if (Auth::User()->id !== $post->creator->id)
            return redirect('/');

        $post->body = request('body');
        $post->save();

        return redirect('/');
    }
    
}
