<?php

namespace App\Http\Controllers\Utils;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TableController extends Controller
{
    public function posts()
    {
        $data = Post::with(['category', 'user'])->orderBy('updated_at', 'desc')->get();
    }
    public function categories()
    {
        $data = Category::with(['posts'])->orderBy('updated_at', 'desc')->get();
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($data) {
            return view('dashboard.categories.table__button')->with('data', $data);
        })
        ->make(true);
    }
    public function tags()
    {
        $data = Tag::with(['posts'])->orderBy('updated_at', 'desc')->get();
    }
}
