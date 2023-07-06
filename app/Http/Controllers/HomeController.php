<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class HomeController extends Controller
{
    public function index()
    {
        $agent = new Agent();
        $browser = $agent->browser();
        $platform = $agent->platform();
        $device = $agent->device();
        $versionPlatform = $agent->version($platform);
        $versionDevice = $agent->version($device);
        $versionBrowser = $agent->version($browser);

        
        $posts = Post::with(['category', 'user'])->orderBy('updated_at', 'desc')->get();
        $categories = Category::orderBy('updated_at', 'desc')->get();
        return view('landing.world.index', [
            'title' => '',
        ], compact('posts', 'categories'));
    }
    
    public function show_post(Post $post)
    {
        return view('landing.world.detail', [
            'title' => $post->title,
            'heropost' => $post,
        ], compact('post'));
    }
}
