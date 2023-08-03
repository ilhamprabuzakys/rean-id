<?php

namespace App\Livewire\Dashboard;

use App\Models\Tag;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Tags extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    public $popularityFilter = 0;
    public $paginate = 5;
    
    public $name, $slug, $tag_id, $data_posts;

    protected $updatesQueryString = ['search'];

    public function mount()
    {
        $this->search = request()->query('search');
        // jika Anda ingin mengatur nilai default $slug ketika komponen dimuat
        $this->slug = Str::slug($this->name);
    }

    public function updatedName($value) {
        // jika Anda ingin mengubah $slug setiap kali $name berubah
        $this->slug = Str::slug($value);
    }

    public function render()
    {
        $tags = $this->search === null 
        ? Tag::orderBy('updated_at', 'desc')->paginate($this->paginate) 
        : Tag::orderBy('updated_at', 'desc')->where('name', 'like', '%' . $this->search . '%')->paginate($this->paginate);
        return view('livewire.dashboard.tags.index', compact('tags'));
    }

    public function rules() 
    {
        return [
            'name' => 'required',
            'slug' => 'required',
        ];
    }
 
    protected $messages = [
        'name.required' => 'Field nama harus terisi.',
        'slug.required' => 'Field slug harus terisi.',
    ];
 
    protected $validationAttributes = [
        'name' => 'name',
        'slug' => 'slug',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $validatedData = $this->validate();
        Tag::create([
            'name' => $validatedData['name'],
            'slug' => $validatedData['slug'],
        ]);
        session()->flash('success', "Tag baru berhasil ditambahkan!");
        $this->resetInput();
        // $this->dispatchBrowserEvent('close-modal');
        // $this->emit('userStore');
    }

    public function destroy()
    {
        Tag::findOrFail($this->tag_id)->delete();
        session()->flash('success', "Tag berhasil dihapus!");
        $this->dispatchBrowserEvent('close-modal');
    }

    public function postinganTerkait(int $tag_id)
    {
        $tag = Tag::findOrFail($tag_id);
        if ($tag) {
            $this->tag_id = $tag->id;
            $this->name = $tag->name;
            $this->data_posts = $tag->posts();
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
