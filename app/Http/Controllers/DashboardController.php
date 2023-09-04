<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ebook;
use App\Models\Event;
use App\Models\News;
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
        if (auth()->user()->role == 'member') {
            $jumlahPostingan = Post::where('user_id', auth()->user()->id)->count();
            $jumlahEbook = Ebook::where('user_id', auth()->user()->id)->count();
        } else {
            $jumlahPostingan = Post::count();
            $jumlahEbook = Ebook::count();
        }
        
        $jumlahKategori = Category::count();
        $jumlahLabel = Tag::count();
        $jumlahEvent = Event::count();
        $jumlahBerita = News::count();
        $jumlahSuperadmin = User::where('role', 'superadmin')->count();
        $jumlahAdmin = User::where('role', 'admin')->count();
        $jumlahMember = User::where('role', 'member')->count();

        $user = auth()->user();

        return view('dashboard.pages.basic', [
            'title' => 'Dashboard',
        ], compact('user', 'jumlahUser', 'jumlahPostingan', 'jumlahKategori', 'jumlahLabel', 'jumlahEvent',
        'jumlahEbook', 'jumlahBerita', 'jumlahSuperadmin', 'jumlahAdmin', 'jumlahMember'));
    }

    public function getPageData()
    {
        if (auth()->user()->role == 'member')
        {
            $pages = collect([
                [
                    'name' => 'Dashboard Utama',
                    'icon' => 'mdi-monitor',
                    'url' => route('dashboard')
                ],
                [
                    'name' => 'Daftar Postingan',
                    'icon' => 'mdi-library-outline',
                    'url' => route('posts.index')
                ],
                [
                    'name' => 'Buat Postingan',
                    'icon' => 'mdi-library-outline',
                    'url' => route('posts.create')
                ],
                [
                    'name' => 'Daftar Ebook',
                    'icon' => 'mdi-book-check-outline',
                    'url' => route('ebooks.index')
                ],
                [
                    'name' => 'Buat Ebook',
                    'icon' => 'mdi-book-check-outline',
                    'url' => route('ebooks.create')
                ],
                [
                    'name' => 'Daftar Aktivitas',
                    'icon' => 'mdi-resistor',
                    'url' => route('logs.index')
                ],
                [
                    'name' => 'Profile',
                    'icon' => 'mdi-account-outline',
                    'url' => route('profile')
                ],
                [
                    'name' => 'Settings Profile',
                    'icon' => 'mdi-account-outline',
                    'url' => route('settings', ['tab' => 'profile'])
                ],
                [
                    'name' => 'Settings Keamanan',
                    'icon' => 'mdi-cog-outline',
                    'url' => route('settings', ['tab' => 'security'])
                ],
                [
                    'name' => 'Settings Sosial Media',
                    'icon' => 'mdi-cog-outline',
                    'url' => route('settings', ['tab' => 'social-media'])
                ],
            ]);
        } else {
            $pages = collect([
                [
                    'name' => 'Dashboard Utama',
                    'icon' => 'mdi-monitor',
                    'url' => route('dashboard')
                ],
                [
                    'name' => 'Daftar Event',
                    'icon' => 'mdi-calendar-check',
                    'url' => route('events.index')
                ],
                [
                    'name' => 'Buat Event',
                    'icon' => 'mdi-calendar-check',
                    'url' => route('events.create')
                ],
                [
                    'name' => 'Daftar Postingan',
                    'icon' => 'mdi-library-outline',
                    'url' => route('posts.index')
                ],
                [
                    'name' => 'Buat Postingan',
                    'icon' => 'mdi-library-outline',
                    'url' => route('posts.create')
                ],
                [
                    'name' => 'Daftar Ebook',
                    'icon' => 'mdi-book-check-outline',
                    'url' => route('ebooks.index')
                ],
                [
                    'name' => 'Buat Ebook',
                    'icon' => 'mdi-book-check-outline',
                    'url' => route('ebooks.create')
                ],
                [
                    'name' => 'Daftar Berita',
                    'icon' => 'mdi-newspaper-check',
                    'url' => route('news.index')
                ],
                [
                    'name' => 'Buat Berita',
                    'icon' => 'mdi-newspaper-check',
                    'url' => route('news.create')
                ],
                [
                    'name' => 'Daftar Kategori',
                    'icon' => 'mdi-layers-outline',
                    'url' => route('categories.index')
                ],
                [
                    'name' => 'Daftar Label',
                    'icon' => 'mdi-tag-multiple-outline',
                    'url' => route('tags.index')
                ],
                [
                    'name' => 'Daftar User',
                    'icon' => 'mdi-account-group-outline',
                    'url' => route('users.index')
                ],
                [
                    'name' => 'Buat User',
                    'icon' => 'mdi-account-group-outline',
                    'url' => route('users.create')
                ],
                [
                    'name' => 'Daftar Aktivitas',
                    'icon' => 'mdi-resistor',
                    'url' => route('logs.index')
                ],
                [
                    'name' => 'Profile',
                    'icon' => 'mdi-account-outline',
                    'url' => route('profile')
                ],
                [
                    'name' => 'Settings Profile',
                    'icon' => 'mdi-account-outline',
                    'url' => route('settings', ['tab' => 'profile'])
                ],
                [
                    'name' => 'Settings Keamanan',
                    'icon' => 'mdi-cog-outline',
                    'url' => route('settings', ['tab' => 'security'])
                ],
                [
                    'name' => 'Settings Sosial Media',
                    'icon' => 'mdi-cog-outline',
                    'url' => route('settings', ['tab' => 'social-media'])
                ],
            ]);
        }
    
        return $pages;
    }

    public function getPagesJson()
    {
        $pages = $this->getPageData();
        return response()->json(['pages' => $pages]);
    }
}
