<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TagResource;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $data = Tag::with(['posts'])->orderBy('updated_at', 'desc')->get();
        return response()->json([
            'data' => TagResource::collection($data),
            'message' => 'Fetch all data tags',
            'success' => true
        ]);
    }
}
