<?php

namespace App\Livewire\Dashboard\Tags;

use App\Models\Tag;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class TagCreate extends Component
{
    public $name;

    public function render()
    {
        return view('livewire.dashboard.tags.tag-create');
    }

    public function store()
    {
        $this->validate([
            "name" => ["required", "min:3", Rule::unique('tags')]
        ], [
            'name.required' => 'Nama harus diisi',
            'name.min' => 'Nama minimal itu harus 3 karakter',
            'name.unique' => 'Label dengan nama ini sudah ada'
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
