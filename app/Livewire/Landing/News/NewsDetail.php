<?php

namespace App\Livewire\Landing\News;

use Livewire\Attributes\On;
use Livewire\Component;

class NewsDetail extends Component
{
    public $news;

    public function mount($news)
    {
        $this->news = $news;
    }

    public function render()
    {
        return view('livewire.landing.news.news-detail');
    }

}
