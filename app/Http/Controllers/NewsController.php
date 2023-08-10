<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('dashboard.news.index', [
            'title' => 'Daftar Berita',
        ]);
    }

    public function create()
    {
        return view('dashboard.news.create', [
            'title' => 'Buat Berita',
        ]);
    }

    // public function store(Request $request)
    // {
    //     //
    // }

    // public function show(News $news)
    // {
    //     //
    // }

    public function edit(News $news)
    {
        return view('dashboard.news.edit', [
            'title' => 'Perbarui Berita',
        ], compact('news'));
    }

    public function update(Request $request, News $news)
    {
        //
    }

    public function destroy(News $news)
    {
        //
    }
}
