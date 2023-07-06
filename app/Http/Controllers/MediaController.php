<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index()
    {
        if (auth()->user()->role != 'superadmin' && auth()->user()->role != 'admin') {
            $medias = Media::where('user_id', auth()->user()->id)->orderBy('updated_at', 'desc')->get();
        } else {
            $medias = Media::orderBy('updated_at', 'desc')->get();
        }

        return view('dashboard-borex.media.index', [
            'title' => 'Media',
            'medias' => $medias
        ]);
    }
}
