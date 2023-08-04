<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteBuilderController extends Controller
{
    /* Jika anda ingin mengubah personalisasi website bagian front-end Landing Page */

    /* Bagian components seperti warna dari navbar, footer */
    public function components()
    {
        return view('dashboard.frontend.components', [
            'title' => 'Personalisasi Komponen'
        ]);
    }
    
    /* Bagian image seperti image dari post detail hero */
    public function background_images()
    {
        return view('dashboard.frontend.background-images', [
            'title' => 'Personalisasi Image'
        ]);
    }

}
