<?php

namespace App\Livewire\Dashboard\Tags;

use App\Models\Tag;
use Livewire\Component;
use Illuminate\Support\Str;

class TagUpdate extends Component
{
    protected $listeners = [
        "edit"
    ];

    public $name, $tagId;
    public function render()
    {
        return view('livewire.dashboard.tags.tag-update');
    }

    public function edit($tag){
        $this->name = $tag["name"];
        $this->tagId = $tag["id"];
    }

    public function update(){
        $tag = Tag::find($this->tagId);

        if ($tag) {
            $oldname = $tag->name;
            $tag->update([
                "name" => $this->name,
                "slug" => Str::slug($this->name)
            ]);

            $name = $this->name;
            $this->emit("storeUpdate", "Berhasil mengubah tag $oldname menjadi $name");
            $this->emit('alertSuccess', 'Data berhasil diupdate');
            $this->resetInput();
        } else{
            $this->emit("errorUpdate");
            $this->emit('alertError', 'Data gagal diupdate');
            $this->resetInput();
        }
    }

    public function resetInput()
    {
        $this->name = null;
        $this->tagId = null;
    }
}
