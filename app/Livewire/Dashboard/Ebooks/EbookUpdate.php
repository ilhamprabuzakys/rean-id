<?php

namespace App\Livewire\Dashboard\Ebooks;

use App\Models\Ebook;
use Livewire\Component;

class EbookUpdate extends Component
{
    protected $listeners = [
        "edit" => 'setEbook'
    ];
    public $title, $description, $pages, $author, $published_at, $body, $ebook_id, $user_id;
    public $statusUpdate;

    public function mount($statusUpdate, $user)
    {
        $this->user_id = $user;
        $this->statusUpdate = $statusUpdate;
    }

    public function render()
    {
        return view('livewire.dashboard.ebooks.ebook-update');
    }

    public function setEbook($ebook)
    {
        $this->title = $ebook['title'];
        $this->description = $ebook['description'];
        $this->pages = $ebook['pages'];
        $this->author = $ebook['author'];
        $this->published_at = $ebook['published_at'];
        $this->body = $ebook['body'];
    }

    public function update()
    {
        $ebook = Ebook::findOrFail($this->ebook_id);
        $ebook->update($this->all());
        $this->resetInput();
        $this->emit('swalS', 'Pembuatan Ebook', 'Berhasil menambah data Ebook');
        $this->emit('statusUpdated', false);
    }

    public function resetInput()
    {
        $this->title = null;
        $this->description = null;
        $this->pages = null;
        $this->author = null;
        $this->published_at = null;
        $this->body = null;
    }

    public function cancelUpdate()
    {
        $this->statusUpdate = false;
    }

}
