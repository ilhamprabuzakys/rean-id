<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function json()
    {
        $results = DB::table('events')->select('title', 'latitude', 'longitude')->get();
        return \json_encode($results);
    }

    public function index()
    {
        return view('dashboard.events.index', ['title' => 'Daftar Event']);
    }

    public function create()
    {
        return view('dashboard.events.create', ['title' => 'Buat Event']);
    }

    public function show(Event $event)
    {
        return view('dashboard.events.show', ['title' => 'Detail Event'], compact('event'));
    }

    public function edit(Event $event)
    {
        return view('dashboard.events.edit', ['title' => 'Edit Event'], compact('event'));
    }
}
