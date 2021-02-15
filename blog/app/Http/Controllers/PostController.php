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

        // get: params
        $user = Auth::User();

        $post = Post::create([
            'body' => request('body'),
            'creator_id' => $user->id,
        ]);

        // get: return params
        $posts = Post::all();

        return view('dashboard', compact('posts'));
    }

    public function destroy(Post $post)
    {
        // authentication: backend
        if (Auth::User()->id !== $post->creator->id)
            return view('dashboard', compact('posts'));
        
        Post::destroy($post->id);

        // get: return params
        $posts = Post::all();

        return view('dashboard', compact('posts'));
    }
    
    
    public function edit(Post $post)
    {
        $this->validate(request(), [
            'body' => 'required',
        ]);

        // get: params
        $user = Auth::User();

        // authentication: backend
        if ($user->id !== $post->creator->id)
            return view('dashboard', compact('posts'));

        $post->body = request('body');
        $post->save();

        // get: return params
        $posts = Post::all();

        return view('dashboard', compact('posts'));
    }

    public function hello() {
        dd('here');
    }
    
}
