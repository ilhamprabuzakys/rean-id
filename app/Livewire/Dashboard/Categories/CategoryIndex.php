<?php

namespace App\Livewire\Dashboard\Categories;

use Livewire\Component;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

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
        $this->dispatchBrowserEvent('close-modal');
        // $this->emit('alertSuccess', 'Berhasil menambahkan Kategori baru', 'Pembuatan Kategori');
        $this->emit('swalS', 'Pembuatan Kategori', 'Berhasil menambah data Kategori');
        // $this->emit('KategoriStore');
    }

    public function update()
    {
        $this->validate();
        $category = Category::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
        ]);
        $this->resetInput();
        // $this->emit('alertSuccess', 'Berhasil memperbarui data Kategori', 'Update Kategori');
        $this->dispatchBrowserEvent('close-modal');
        $this->emit('swalS', 'Update Kategori', 'Berhasil memperbarui data Kategori');
    }
    
    public function destroy()
    {
        Category::findOrFail($this->category_id)->delete();
        $this->dispatchBrowserEvent('close-modal');
        // $this->emit('alertSuccess', 'Berhasil menghapus data Kategori', 'Penghapusan Kategori');
        $this->emit('swalS', 'Penghapusan Kategori', 'Berhasil menghapus data Kategori');

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
        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'title' => $title, 'message' => $message]);
    }
  
    public function alertError($message, $title = 'Error')
    {
        $this->dispatchBrowserEvent('alert', ['type' => 'error',  'title' => $title, 'message' => $message]);
    }
  
    public function alertInfo($message, $title = 'Informasi')
    {
        $this->dispatchBrowserEvent('alert', ['type' => 'info',  'title' => $title, 'message' => $message]);
    }
}
