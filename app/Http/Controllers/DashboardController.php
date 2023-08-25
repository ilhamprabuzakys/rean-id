<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahUser = User::count();
        $jumlahPostingan = Post::count();
        $jumlahKategori = Category::count();
        $jumlahLabel = Tag::count();

        $jumlahSuperadmin = User::where('role', 'superadmin')->count();
        $jumlahAdmin = User::where('role', 'admin')->count();
        $jumlahMember = User::where('role', 'member')->count();

        $user = auth()->user();

        return view('dashboard.pages.basic', [
            'title' => 'Dashboard',
        ], compact('user', 'jumlahUser', 'jumlahPostingan', 'jumlahKategori', 'jumlahLabel', 'jumlahSuperadmin', 'jumlahAdmin', 'jumlahMember'));
    }
}
