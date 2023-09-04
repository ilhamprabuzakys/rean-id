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
        $query_related_post = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id) // untuk menghindari mendapatkan post yang sama
            ->take(4) // Ambil lima postingan terkait saja sebagai contoh
            ->get();

        if ($query_related_post->count() > 3) {
            $this->related_post = $query_related_post;
        } else {
            $neededMore = 4 - $query_related_post->count();
            $addiotional_query = Post::where('user_id', $post->user_id)
            ->where('id', '!=', $post->id) // untuk menghindari mendapatkan post yang sama
            ->take($neededMore) // Ambil lima postingan terkait saja sebagai contoh
            ->get();
            $allNotifications = $query_related_post->concat($addiotional_query)->unique('id');
            $this->related_post = $allNotifications;
        }
        
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
        if ($this->post->status == 'approved' || $this->post->user_id == auth()->user()->id || auth()->user()->role != 'member') {
            return view('livewire.landing.posts.post-detail');
        }
        return abort(404);
    }
}
