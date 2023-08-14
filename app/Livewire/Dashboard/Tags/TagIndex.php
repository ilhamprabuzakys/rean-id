<?php

namespace App\Livewire\Dashboard\Tags;

use App\Models\Tag;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
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
        'statusUpdated' => 'handleStatusUpdate'
    ];

    public $search;
    public $popularityFilter = 0;
    public $paginate = 5;
    
    public $name, $tag_id, $data_posts;
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
        $tags = Tag::with('posts')->latest('updated_at')->paginate(5);
        return view('livewire.dashboard.tags.tag-index', compact('tags'));
    }

    public function edit($id){
        $tag = Tag::findOrFail($id);
        $this->statusUpdate = true;
        $this->dispatch("edit", $tag)->to(TagUpdate::class);
    }

    public function destroy()
    {
        $tag = Tag::findOrFail($this->tag_id);
        $tag->delete();

        $this->dispatch('alert', [
            'title' => 'Berhasil',
            'message' => 'Data berhasil dihapus',
            'type' => 'success',
        ]);

        $this->dispatch('close-modal');
    }

    public function storeUpdate(){
        $this->statusUpdate = false;
    }

    public function errorUpdate(){
        $this->statusUpdate = false;
    }

    #[On('statusUpdated')]
    public function handleStatusUpdate($statusUpdate)
    {
        $this->statusUpdate = $statusUpdate;
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
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

}
