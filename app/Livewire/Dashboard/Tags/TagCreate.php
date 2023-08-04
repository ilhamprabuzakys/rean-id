<?php

namespace App\Livewire\Dashboard\Tags;

use App\Models\Tag;
use Livewire\Component;
use Illuminate\Support\Str;

class TagCreate extends Component
{
    public $name, $slug;

    public function render()
    {
        return view('livewire.dashboard.tags.tag-create');
    }

    public function store()
    {
        $this->validate([
            "name" => "required|min:3"
        ]);
        $tag = Tag::create([
            "name" => $this->name,
            "slug" => Str::slug($this->name)
        ]);

        $name = $tag->name;
        $this->emit("storeTag", "Tag $name berhasil ditambahkan");
        $this->emit('alertSuccess', 'Data berhasil ditambahkan');
        $this->resetInput();
    }

    public function resetInput(){
        $this->name = null;
    }
}
