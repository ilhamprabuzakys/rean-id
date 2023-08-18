<?php

namespace App\Livewire\Dashboard\Tags;

use App\Models\Tag;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;

class TagUpdate extends Component
{
    public $name, $tagId;
    public $statusUpdate;

    #[On('dataEdit')]
    public function setData($tag){
        dd($tag);
        $this->name = $tag["name"];
        $this->tagId = $tag["id"];
    }

    public function mount($statusUpdate)
    {
        $this->statusUpdate = $statusUpdate;
    }
    public function render()
    {
        return view('livewire.dashboard.tags.tag-update');
    }

    public function update(){
        $tag = Tag::find($this->tagId);
        $this->validate([
            "name" => ["required", "min:3", Rule::unique('tags')->ignore($this->tagId)]
        ]);

        if ($tag) {
            $oldname = $tag->name;
            $tag->update([
                "name" => $this->name,
                "slug" => Str::slug($this->name)
            ]);

            $name = $this->name;
            $this->dispatch('alert', [
                'title' => 'Berhasil',
                'message' => "Data berhasil diubah dari {$oldname} ke {name}",
                'type' => 'success',
            ]);
            $this->resetInput();
        } else{
            $this->dispatch("errorUpdate");
            $this->dispatch('swal:modal', [
                'title' => 'Gagal Update',
                'text' => "Terjadi kesalahan, coba refresh halaman",
                'icon' => 'error',
            ]);
            $this->resetInput();
        }
    }

    public function resetInput()
    {
        $this->name = null;
        $this->tagId = null;
    }

    public function handleStatusUpdate($statusUpdate)
    {
        $this->statusUpdate = $statusUpdate;
    }

    public function cancelUpdate()
    {
        $this->dispatch('statusUpdated', false);
    }
    
}
