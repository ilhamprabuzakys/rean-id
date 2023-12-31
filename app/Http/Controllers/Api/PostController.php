<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $data = Post::with(['category', 'user'])->orderBy('updated_at', 'desc')->get();
        return response()->json([
            'data' => PostResource::collection($data),
            'message' => 'Fetch all data posts',
            'success' => true
        ]);
    }
}
