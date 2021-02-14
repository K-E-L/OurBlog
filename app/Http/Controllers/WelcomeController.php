<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class WelcomeController extends Controller
{
    public function index() {
        return view('welcome');
    }

    public function dashboard() {
        // get: params
        $posts = Post::all();

        return view('dashboard', compact('posts'));
    }
    
}
