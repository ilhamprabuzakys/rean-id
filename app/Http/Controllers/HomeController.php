<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('updated_at', 'desc')->get();
        $categories = Category::orderBy('updated_at', 'desc')->get();
        return view('landing.index', [
            'title' => '',
        ], compact('posts', 'categories'));
    }
    
    public function show_post(Post $post)
    {
        return view('home.show', [
            'title' => $post->title,
        ], compact('post'));
    }
}
