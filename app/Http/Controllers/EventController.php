<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
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
        return view('dashboard.events.index', ['title' => 'Daftar Event']);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Event $event)
    {
        return view('dashboard.events.show', ['title' => 'Daftar Event']);
    }

    public function edit(Event $event)
    {
        return view('dashboard.events.edit', ['title' => 'Daftar Event']);
    }

    public function update(Request $request, Event $event)
    {
        //
    }

    public function destroy(Event $event)
    {
        //
    }
}
