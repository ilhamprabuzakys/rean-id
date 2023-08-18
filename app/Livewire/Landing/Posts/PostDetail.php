<?php

namespace App\Livewire\Landing\Posts;

use Livewire\Attributes\On;
use Livewire\Component;

class PostDetail extends Component
{
    public $post;

    public function mount($post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.landing.posts.post-detail');
    }

}
