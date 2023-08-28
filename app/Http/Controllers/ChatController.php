<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        return view('dashboard.chats.index', [
            'title' => 'Layanan Chat'
        ]);
    }
}