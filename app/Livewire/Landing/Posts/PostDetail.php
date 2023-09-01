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
        $this->media_post = Post::find($post->id)->media->first();
        // $this->media_post = Post::whereHas('files', function ($query) {
        //     $query->where('file_path', 'like', '%.mp3')
        //         ->orWhere('file_path', 'like', '%.mp4');
        // })->get();
    }

    public function likeThis()
    {
        if (auth()->check()) {
            if ($this->post->likes->contains(auth()->user())) {
                // Pengguna sudah menyukai post, maka kita hapus like-nya
                $this->post->disableLogging();
                $this->post->likes()->detach(auth()->id());
                // Log aktivitas
                // activity('Postingan')  // Anda dapat mengganti 'custom_log' dengan nama log yang Anda inginkan
                //     ->performedOn($this->post)
                //     ->causedBy(auth()->user())
                //     ->withProperties([
                //         'action' => 'unliked',
                //         'post_target' => $this->post->id,
                //         'action_user' => auth()->user()->id,
                //         'post_author' => $this->post->user->id,
                //         'message' => auth()->user()->name . ' batal menyukai postingan ' . $this->post->title,
                //     ])
                //     ->event('unliked')
                //     ->log(auth()->user()->name . ' batal menyukai postingan ' . $this->post->title);
            } else {
                // dd('blm like');
                // Pengguna belum menyukai post, maka kita tambahkan like-nya
                $this->post->disableLogging();
                $this->post->likes()->attach(auth()->id());
                // Log aktivitas
                activity('Postingan')  // Anda dapat mengganti 'custom_log' dengan nama log yang Anda inginkan
                    ->performedOn($this->post)
                    ->causedBy(auth()->user())
                    ->withProperties([
                        'action' => 'liked',
                        'post_target' => $this->post->id,
                        'action_user' => auth()->user()->id,
                        'post_author' => $this->post->user->id,
                        'message' => auth()->user()->name . ' menyukai postingan ' . $this->post->title,
                    ])
                    ->event('liked')
                    ->log(auth()->user()->name . ' menyukai postingan anda');
            }
            $this->post->refresh();
        } else {
            $this->dispatch('notAuthenticated');
        }
    }

    public function render()
    {
        return view('livewire.landing.posts.post-detail');
    }
}
