<?php

namespace App\Livewire\Dashboard\Tags;

use App\Models\Post;
use App\Models\Tag;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class TagIndex extends Component
{
    use WithPagination;

    public $search;
    public $rolefilter = '';
    public $paginate = 5;

    public $name, $tag, $tag_id, $dataposts;
    public $name_placeholder = '';

    public function render()
    {
        $tags = Tag::with(['posts'])->latest('updated_at')->when($this->search, function($query) {
            return $query->search($this->search);
        })->paginate($this->paginate);

        return view('livewire.dashboard.tags.tag-index', [
            'tags' => $tags,
        ]);
    }

    public function rules()
    {
        return [
            'name' => ['required', 'min:4', Rule::unique('tags')->ignore($this->tag_id)],
        ];
    }

    protected $messages = [
        'name.required' => 'Nama Tag harus terisi.',
        'name.min' => 'Nama Tag minimal harus 4 karakter.',
        'name.unique' => 'Tag dengan nama ini sudah ada.',
    ];

    protected $validationAttributes = [
        'name' => 'Name',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $this->validate();
        $tag = Tag::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
        ]);
        $this->resetInput();
        $this->dispatch('close-modal');
        $this->dispatch('alert', [
            'title' => 'Berhasil',
            'message' => 'Data berhasil ditambahkan',
            'type' => 'success',
        ]);
    }

    public function update()
    {
        $this->validate();
        $tag = Tag::find($this->tag_id);
        if ($this->name == $tag->name) {
            $this->dispatch('alert', [
                'title' => 'Tidak ada perubahan',
                'message' => 'Data tidak berubah',
                'type' => 'info',
            ]);
            $this->dispatch('close-modal');
        } else {
            $tag->update([
                'name' => $this->name,
                'slug' => Str::slug($this->name),
            ]);
            $this->resetInput();
            $this->dispatch('close-modal');
            $this->dispatch('alert', [
                'title' => 'Berhasil',
                'message' => 'Data berhasil diperbarui',
                'type' => 'success',
            ]);
        }
    }

    public function deleteConfirmation($id)
    {
        $this->tag_id = $id;
        $this->dispatch('swal:confirmation', [
            'title' => 'Tag',
        ]);
    }

    #[On('deleteConfirmed')]
    public function destroy()
    {
        $tag = Tag::findOrFail($this->tag_id);
        $tag->delete();
        $this->dispatch('alert', [
            'title' => 'Berhasil',
            'message' => 'Data berhasil dihapus',
            'type' => 'success',
        ]);
    }

    public function editTag(int $tag_id)
    {
        $tag = Tag::findOrFail($tag_id);
        if ($tag) {
            $this->tag_id = $tag->id;
            $this->name = $tag->name;
            $this->name_placeholder = $tag->name;
        } else {
            return back();
        }
    }

    public function postinganTerkait(int $tag_id)
    {
        $tag = Tag::find($tag_id);
        if ($tag) {
            $this->tag_id = $tag->id;
            $this->name_placeholder = $tag->name;
            $this->dataposts = Post::whereHas('tags', function($query) {
                return $query->where('tags.id', $this->tag_id);
            })->latest('updated_at')->get();            
        } else {
            return back();
        }
    }

    public function findTag(int $tag_id)
    {
        $this->tag_id = $tag_id;
    }

    public function resetInput()
    {
        $this->name = null;
        $this->name_placeholder = null;
    }

    public function closeModal()
    {
        $this->resetValidation();	
        $this->resetInput();
    }

    public function closeCanvas()
    {
        $this->resetInput();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
