<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use Illuminate\Http\Request;

class EbookController extends Controller
{
    public function index()
    {
        return view('dashboard.ebooks.index', [
            'title' => 'Daftar Ebook',
        ]);
    }

    public function create()
    {
        return view('dashboard.ebooks.create', [
            'title' => 'Buat Ebook',
        ]);
    }

    public function edit(Ebook $ebook)
    {
        return view('dashboard.ebooks.edit', [
            'title' => 'Edit Ebook',
        ], compact('ebook'));
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
