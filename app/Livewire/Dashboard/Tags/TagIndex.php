<?php

namespace App\Livewire\Dashboard\Tags;

use App\Models\Tag;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class TagIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        "storeTag",
        "storeUpdate",
        "errorUpdate",
        "alertSuccess",
        "alertError",
        "alertInfo",
    ];

    public $search;
    public $popularityFilter = 0;
    public $paginate = 5;
    
    public $name, $slug, $tag_id, $data_posts;
    public $statusUpdate = false;

    protected $updatesQueryString = ['search'];
    protected $queryString = ['search' => ['except' => '']];

    public function mount()
    {
        $this->search = request()->query('search');
        // jika Anda ingin mengatur nilai default $slug ketika komponen dimuat
        // $this->slug = Str::slug($this->name);
    }

    // public function updatedName($value) {
    //     // jika Anda ingin mengubah $slug setiap kali $name berubah
    //     $this->slug = Str::slug($value);
    // }

    public function render()
    {
        $tags = $this->search === null 
        ? Tag::with('posts')->latest('updated_at')->paginate($this->paginate) 
        : Tag::with('posts')->latest('updated_at')->where('name', 'like', '%' . $this->search . '%')->paginate($this->paginate);
        return view('livewire.dashboard.tags.tag-index', compact('tags'));
    }

    public function edit($id){
        $tag = Tag::findOrFail($id);
        $this->statusUpdate = true;
        $this->emit("edit",$tag);
    }

    public function delete()
    {
        $tag = Tag::findOrFail($this->tag_id)->delete();
        $name = $tag->name;
        $tag->delete();
        \session()->flash('success', "Tag " .$name. " berhasil dihapus");
        $this->dispatchBrowserEvent('close-modal');
    }

    public function storeTag($message){
        \session()->flash("success", $message);
    }

    public function storeUpdate($message){
        \session()->flash("success", $message);
        $this->statusUpdate = false;
    }

    public function errorUpdate(){
        \session()->flash("error","Gagal mengubah tag");
        $this->statusUpdate = false;
    }

    public function postinganTerkait(int $tag_id)
    {
        $tag = Tag::findOrFail($tag_id);
        // dd($tag->posts);
        if ($tag) {
            $this->tag_id = $tag->id;
            $this->name = $tag->name;
            $this->data_posts = $tag->posts;
        } else {
            return back();
        }
    }

    public function findId(int $tag_id)
    {
        $this->tag_id = $tag_id;
    }

    public function resetInput()
    {
        $this->name = '';
        $this->slug = '';
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function alertSuccess($message)
    {
        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'title' => 'Berhasil', 'message' => $message]);
    }
  
    public function alertError($message)
    {
        $this->dispatchBrowserEvent('alert', ['type' => 'error',  'title' => 'Error', 'message' => $message]);
    }
  
    public function alertInfo($message)
    {
        $this->dispatchBrowserEvent('alert', ['type' => 'info',  'title' => 'Informasi', 'message' => $message]);
    }
}
