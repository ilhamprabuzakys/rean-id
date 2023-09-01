<?php

namespace App\Livewire\Landing\Users;

use App\Models\Ebook;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class UserEbook extends Component
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
        $query = Ebook::where('status', 'approved')->where('user_id', $this->user->id)
        ->latest('updated_at')->when($this->paginate, function ($query) {
            return $query->paginate($this->paginate);
        });
        
        $ebooks = $query;
        return view('livewire.landing.users.user-ebook', compact('ebooks'));
    }

}
