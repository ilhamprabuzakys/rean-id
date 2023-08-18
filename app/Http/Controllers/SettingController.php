<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function profile()
    {
        return view('dashboard.settings.profile', [
            'title' => 'Profile',
        ]);
    }
    
    public function settings()
    {
        return view('dashboard.settings.settings', [
            'title' => 'Settings',
        ]);
    }
}
