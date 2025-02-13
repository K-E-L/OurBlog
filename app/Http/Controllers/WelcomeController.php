<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Post;
use DB;

class WelcomeController extends Controller
{
    public function index() {
        // default: database
        $posts = Post::with(['creator'])->orderBy('created_at', 'DESC')->paginate(5, ["*"], 'posts');

        return view('dashboard', compact('posts'));
    }

    public function showArticles() {
        // secondary: article database
        $articles = DB::connection('mysql2')->select('select * from articles');

        return view('articles', compact('articles'));
    }
    
}
