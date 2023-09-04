<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Ebook;
use App\Models\Event;
use App\Models\News;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent;
use Spatie\Analytics\Facades\Analytics;
use Spatie\Analytics\Period;

class HomeController extends Controller
{
    public function index()
    {
        $agent = new Agent();
        $browser = $agent->browser();
        $platform = $agent->platform();
        $device = $agent->device();
        $versionPlatform = $agent->version($platform);
        $versionDevice = $agent->version($device);
        $versionBrowser = $agent->version($browser);


        $posts = Post::with(['category', 'user'])->where('status', 'approved')->orderBy('updated_at', 'desc')->get();
        // $mostViewedArticle = Post::mostViewed($posts, 5, 'artikel');
        $categories = Category::orderBy('updated_at', 'desc')->get();
        $events = Event::with(['user'])->latest('updated_at')->get();
        return view('landing.home.static.index', compact('posts', 'categories', 'events'));
    }

    public function about()
    {
        return view('landing.home.static.about', [
            'title' => 'About',
        ]);
    }

    public function cns_radio()
    {
        return view('landing.home.static.cns-radio', [
            'title' => 'CNS Radio',
        ]);
    }

    public function contact()
    {
        return view('landing.home.static.contact-us', [
            'title' => 'Contact Us',
        ]);
    }

    public function analytics()
    {
        // $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days(7));
        $analyticsData = Analytics::fetchTotalVisitorsAndPageViews(Period::days(7));
        dd($analyticsData);
        return view('welcome', [
            'title' => 'Analytics Data',
            'analyticsData' => $analyticsData,
        ]);
    }

    public function chat()
    {
        return view('landing.home.static.chat', [
            'title' => 'Chatingan Dulu',
        ]);
    }

    public function all_post()
    {
        $posts = Post::with(['category', 'user', 'tags'])->where('status', 'approved')->latest('updated_at')->get();
        $categories = Category::oldest('name')->get();
        $firstPost = $posts->first();
        return view('landing.home.posts.index', [
            'title' => 'Daftar Postingan',
        ], compact('posts', 'categories', 'firstPost'));
    }

    public function semua_postingan()
    {
        return view('landing.home.posts.posts-all', [
            'title' => 'Daftar Postingan',
        ]);
    }

    public function show_post($category, Post $post)
    {
        return view('landing.home.posts.detail', [
            'title' => $post->title,
            'heropost' => $post,
        ], compact('post'));
    }


    public function category_list()
    {
        $categories = Category::oldest('name')->get();
        return view('landing.home.categories.index', [
            'title' => 'Daftar Kategori',
        ], compact('categories'));
    }

    public function category_view(Category $category)
    {
        $posts = $category->posts->sortByDesc('updated_at');
        return view('landing.home.categories.single-category', [
            'title' => 'Daftar ' . $category->name,
        ], compact('category', 'posts'));
    }

    public function tag_view(Tag $tag)
    {
        $posts = $tag->posts->sortByDesc('updated_at');
        return view('landing.home.tags.single-tag', [
            'title' => 'Tag ' . $tag->name,
        ], compact('tag', 'posts'));
    }

    public function event()
    {
        return view('landing.home.events.index', [
            'title' => 'Daftar Events',
        ]);
    }

    public function event_detail(Event $event)
    {
        return view('landing.home.events.show', [
            'title' => $event->title,
        ], compact('event'));
    }

    public function ebook()
    {
        return view('landing.home.ebooks.index', [
            'title' => 'Daftar Ebook',
        ]);
    }

    public function ebook_detail(Ebook $ebook)
    {
        return view('landing.home.ebooks.show', [
            'title' => $ebook->title,
        ], compact('ebook'));
    }

    public function user_view(User $user)
    {
        return view('landing.home.users.show', [
            'title' => 'Profile ' . $user->name,
        ], compact('user'));
    }

    public function news()
    {
        return view('landing.home.news.index', [
            'title' => 'Daftar Berita',
        ]);
    }

    public function news_detail(News $news)
    {
        return view('landing.home.news.show', [
            'title' => $news->title,
        ], compact('news'));
    }
}
