<?php

namespace App\Livewire\Landing\Posts;

use App\Models\Post;
use Livewire\Attributes\On;
use Livewire\Component;

class PostDetail extends Component
{
    public $post, $related_post;
    public $media_post;

    public function mount($post)
    {
        $this->post = $post;
        $this->related_post = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id) // untuk menghindari mendapatkan post yang sama
            ->take(4) // Ambil lima postingan terkait saja sebagai contoh
            ->get();
        $this->media_post = Post::whereHas('files', function ($query) {
            $query->where('file_path', 'like', '%.mp3')
                ->orWhere('file_path', 'like', '%.mp4');
        })->get();
    }

    public function likeThis()
    {
        if (auth()->check()) {
            if ($this->post->likes->contains(auth()->user())) {
                // Pengguna sudah menyukai post, maka kita hapus like-nya
                $this->post->likes()->detach(auth()->id());
            } else {
                // Pengguna belum menyukai post, maka kita tambahkan like-nya
                $this->post->likes()->attach(auth()->id());
            }
            $this->post->refresh();
        }
    }
    
    public function render()
    {
        return view('livewire.landing.posts.post-detail');
    }
}
