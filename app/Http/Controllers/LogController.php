<?php

namespace App\Http\Controllers;

use App\Models\EventLog;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index()
    {
        $logs = EventLog::with(['subject', 'user'])->orderBy('updated_at', 'desc')->get();
        return view('dashboard.logs.index', [
            'title' => 'Daftar Log',
        ], compact('logs'));
    }
}
