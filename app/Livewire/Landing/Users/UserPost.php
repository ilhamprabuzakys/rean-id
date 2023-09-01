<?php

namespace App\Livewire\Landing\Users;

use App\Models\Post;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class UserPost extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $paginate = 5;
    public $user;
    public function mount($user)
    {
        $this->user = $user;
    }

    public function render()
    {
        $query = Post::with(['tags', 'category'])->where('status', 'approved')->where('user_id', $this->user->id)
        ->latest('updated_at')->when($this->paginate, function ($query) {
            return $query->paginate($this->paginate);
        });
        
        $posts = $query;
        return view('livewire.landing.users.user-post', compact('posts'));
    }

}
