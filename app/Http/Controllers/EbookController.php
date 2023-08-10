<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use Illuminate\Http\Request;

class EbookController extends Controller
{
    public function index()
    {
        return view('dashboard.ebooks.index', [
            'title' => 'Daftar Kategori',
        ]);
    }

    public function create()
    {
        //
    }

    public function edit(Ebook $ebook)
    {
        //
    }

    public function update(Request $request, Ebook $ebook)
    {
        //
    }

    public function destroy(Ebook $ebook)
    {
        //
    }
}
