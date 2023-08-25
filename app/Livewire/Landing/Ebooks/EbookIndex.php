<?php

namespace App\Livewire\Landing\Ebooks;

use App\Models\Ebook;
use Livewire\Attributes\On;
use Livewire\Component;

class EbookIndex extends Component
{
    public function render()
    {
        $query = Ebook::latest('created_at')->get();
        $ebooks = $query;
        return view('livewire.landing.ebooks.ebook-index', [
            'ebooks' => $ebooks,
        ]);
    }
}
