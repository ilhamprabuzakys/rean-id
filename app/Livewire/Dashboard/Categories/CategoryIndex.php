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
    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        "alertSuccess",
        "alertError",
        "alertInfo",
        "swalS",
        "swalE",
    ];

    public $search;
    public $rolefilter = '';
    public $paginate = 5;

    public $name, $category_id, $category, $dataposts;

    protected $updatesQueryString = ['search'];
    protected $queryString = ['search' => ['except' => '']];


    public function mount()
    {
        $this->search = request()->query('search');
    }

    public function render()
    {
        $categories = $this->search === null ? Category::with(['posts'])->latest('updated_at')->paginate($this->paginate) :
            Category::with(['posts'])->latest('updated_at')->search($this->search)->paginate($this->paginate);

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
        'name.required' => 'Nama harus terisi.',
        'name.min' => 'Nama minimal harus 4 karakter.',
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
        // $this->dispatch('close-modal');
        $this->dispatch('close-offcanvas');
        // $this->emit('alertSuccess', 'Berhasil menambahkan Kategori baru', 'Pembuatan Kategori');
        $this->dispatch('alert', [
            'title' => 'Berhasil',
            'message' => 'Data berhasil ditambahkan',
            'type' => 'success',
        ]);
        // $this->emit('KategoriStore');
    }

    public function update()
    {
        $this->validate();
        Category::find($this->category_id)->update([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
        ]);
        $this->resetInput();
        // $this->emit('alertSuccess', 'Berhasil memperbarui data Kategori', 'Update Kategori');
        $this->dispatch('close-modal');
        $this->dispatch('alert', [
            'title' => 'Berhasil',
            'message' => 'Data berhasil diperbarui',
            'type' => 'success',
        ]);
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
            $this->name = $category->name;
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
        $this->name = '';
    }

    public function closeModal()
    {
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

    public function swalS($title, $text)
    {
        $this->emit('swalBasic', [
            'icon' => 'success',
            'title' => $title,
            'text' => $text,

        ]);
    }

    public function swalE($title, $text)
    {
        $this->emit('swalBasic', [
            'icon' => 'error',
            'title' => $title,
            'text' => $text,
        ]);
    }

    public function swalD($title, $text)
    {
        $this->emit('swalDelete');
    }

    public function alertSuccess($message, $title = 'Berhasil')
    {
        $this->dispatch('alert', ['type' => 'success', 'title' => $title, 'message' => $message]);
    }

    public function alertError($message, $title = 'Error')
    {
        $this->dispatch('alert', ['type' => 'error',  'title' => $title, 'message' => $message]);
    }

    public function alertInfo($message, $title = 'Informasi')
    {
        $this->dispatch('alert', ['type' => 'info',  'title' => $title, 'message' => $message]);
    }
}
