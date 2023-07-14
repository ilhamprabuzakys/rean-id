<?php

namespace App\Http\Controllers;

use App\Models\HeroImage;
use Illuminate\Http\Request;

class HeroImageController extends Controller
{
    public function main()
    {
        $heros = HeroImage::where('type', 'main')->orderBy('updated_at', 'desc')->get();
        return view('dashboard-borex.hero.main', [
            'title' => 'Hero Image Main',
        ], compact('heros'));
    }
    
    public function main_store()
    {
        dd('ayo');
    }
}
