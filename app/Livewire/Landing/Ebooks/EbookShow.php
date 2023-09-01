<?php

namespace App\Livewire\Landing\Ebooks;

use App\Models\Ebook;
use Livewire\Attributes\On;
use Livewire\Component;

class EbookShow extends Component
{
    public $ebook;
    public function mount(Ebook $ebook)
    {
        $this->ebook = $ebook;
    }

    public function render()
    {
        if ($this->ebook->status == 'approved' || $this->ebook->user_id == auth()->user()->id || auth()->user()->role != 'member') {
            return view('livewire.landing.ebooks.ebook-show');
        }
    
        return abort(404);
    }

}
