<?php

namespace App\Livewire\Dashboard\Categories;

use Livewire\Component;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;

class CategoryIndex extends Component
{
    use WithPagination;

    public $search;
    public $rolefilter = '';
    public $paginate = 5;

    public $name, $category, $category_id, $dataposts;

    public function render()
    {
        $categories = Category::with(['posts'])->latest('updated_at')->when($this->search, function($query) {
            return $query->search($this->search);
        })->paginate($this->paginate);

        return view('livewire.dashboard.categories.category-index', [
            'categories' => $categories,
        ]);
    }

    public function rules()
    {
        return [
            'name' => ['required', 'min:4', Rule::unique('categories')->ignore($this->category_id)],
        ];
    }

    protected $messages = [
        'name.required' => 'Nama Kategori harus terisi.',
        'name.min' => 'Nama Kategori minimal harus 4 karakter.',
        'name.unique' => 'Kategori dengan nama ini sudah ada.',
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
        $category = Category::create([
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
        $category = Category::find($this->category_id);
        if ($this->name == $category->name) {
            $this->dispatch('alert', [
                'title' => 'Tidak ada perubahan',
                'message' => 'Data tidak berubah',
                'type' => 'info',
            ]);
            $this->dispatch('close-modal');
        } else {
            $category->update([
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
        $this->category_id = $id;
        $this->dispatch('swal:confirmation', [
            'title' => 'Kategori',
        ]);
    }

    #[On('deleteConfirmed')]
    public function destroy()
    {
        $category = Category::findOrFail($this->category_id);
        $category->delete();
        $this->dispatch('alert', [
            'title' => 'Berhasil',
            'message' => 'Data berhasil dihapus',
            'type' => 'success',
        ]);
    }

    public function editCategory(int $category_id)
    {
        $category = Category::findOrFail($category_id);
        if ($category) {
            $this->category_id = $category->id;
            $this->name = $category->name;
        } else {
            return back();
        }
    }

    public function postinganTerkait(int $category_id)
    {
        $category = Category::find($category_id);
        if ($category) {
            $this->category_id = $category->id;
            $this->dataposts = Post::where('category_id', $category->id)->latest('updated_at')->get();
        } else {
            return back();
        }
    }

    public function findCategory(int $category_id)
    {
        $this->category_id = $category_id;
    }

    public function resetInput()
    {
        $this->name = null;
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
