<?php

namespace App\Http\Controllers;

use App\Mail\MailNotify;
use App\Models\Post;
use App\Models\Category;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Jenssegers\Agent\Agent;

class LandingController extends Controller
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
        return view('landing.home.static.index', [
            'title' => '',
        ], compact('posts', 'categories'));
    }

    public function show_post($category, Post $post)
    {
        $post->increment('views');
        return view('landing.home.posts.detail', [
            'title' => $post->title,
            'heropost' => $post,
        ], compact('post'));
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
    
    public function contact_send(Request $request)
    {
        $rules = [
            'name' => ['required'],
            'email' => ['required', 'email'],
            'subject' => ['string'],
            'message' => ['required', 'min:4'],
        ];

        $validator = Validator::make($request->all(), $rules,  [
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email harus berformat email',
            'subject.string' => 'Subject harus string',
            'message.required' => 'Message harus diisi',
            'message.min:4' => 'Message tidak boleh kurang dari 4 huruf',
        ]);

        if ($validator->fails()) {
            dd($validator->errors());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validated();

        toast('Data Tag berhasil ditambahkan!','success');
        // Alert::success('Data Tag berhasil ditambahkan!', 'Tabel berhasil diperbarui.');
        $message = ContactMessage::create($validatedData);
        try {
            Mail::to(\env('MAIL_USERNAME'))->send(new MailNotify($message));
            return back()->with('success', "Pesan anda telah berhasil kami <b>simpan!</b>");
        } catch (\Throwable $th) {
            return back()->with('error', "Maaf terjadi kesalahan, periksa data mu kembali!");
        }
    }
}
