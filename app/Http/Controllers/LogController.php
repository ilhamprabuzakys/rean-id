<?php

namespace App\Http\Controllers;

use App\Models\EventLog;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index()
    {
        return view('dashboard.logs.index', [
            'title' => 'Log AKtivitas',
        ]);
    }
}
