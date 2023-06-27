<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('updated_at', 'desc')->get();
        return view('home.index', [
            'title' => '',
        ], compact('posts'));
    }
    
    public function show_post(Post $post)
    {
        return view('home.show', [
            'title' => $post->title,
        ], compact('post'));
    }
}
