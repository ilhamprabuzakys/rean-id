<?php

namespace App\Livewire\Landing\Partials;

use App\Models\Ebook;
use App\Models\Event;
use App\Models\News;
use App\Models\Post;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class SearchBar extends Component
{
    public $search;

    public function render()
    {
        $results = [];
        
        if (strlen($this->search) > 0) {
            // dd($this->search);
            // Query untuk mencari data dari keempat model berdasarkan kata kunci
            $results['posts'] = Post::where('title', 'like', '%' . $this->search . '%')->get();
            $results['events'] = Event::where('title', 'like', '%' . $this->search . '%')->get();
            $results['ebooks'] = Ebook::where('title', 'like', '%' . $this->search . '%')->get();
            $results['news'] = News::where('title', 'like', '%' . $this->search . '%')->get();
            // dd($results);
        }
        return view('livewire.landing.partials.search-bar', compact('results'));
    }

}
