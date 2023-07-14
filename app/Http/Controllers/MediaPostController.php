<?php

namespace App\Http\Controllers;

use App\Models\MediaPost;
use Illuminate\Http\Request;

class MediaPostController extends Controller
{
    public function posts()
    {
        $medias = MediaPost::with(['post', 'user'])->orderBy('updated_at', 'desc')->get();
        return view('dashboard-borex.media.post', [
            'title' => 'Media Post',
        ], compact('medias'));
    }
}
