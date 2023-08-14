<?php

namespace App\Livewire\Dashboard\Posts;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Livewire\Component;
use Livewire\WithPagination;

class PostIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;
    public $popularityFilter = 0;
    public $paginate = 10;
    
    public $title, $post_id, $post_item, $filter_category, $filter_status;
    // public $filter_tags = [];
    public $statusUpdate = false;

    protected $updatesQueryString = ['search', 'filter_category', 'filter_status'];
    protected $queryString = [
        'search' => ['except' => ''],
        'filter_category' => ['except' => ''],
        'filter_status' => ['except' => ''],
    ];

    public function mount()
    {
        $this->search = request()->query('search');
        // jika Anda ingin mengatur nilai default $slug ketika komponen dimuat
        // $this->slug = Str::slug($this->name);
    }
    
    public function render()
    {
        $posts = $this->search === null 
        ? Post::with(['tags', 'user', 'category'])->latest('updated_at')->when($this->filter_category,   function($query) {
            return $query->where('category_id', $this->filter_category);
        })->when($this->filter_status,   function($query) {
            return $query->where('status', $this->filter_status);
        })->paginate($this->paginate) 
        : Post::with(['tags', 'user', 'category'])->latest('updated_at')
        ->globalSearch($this->search)
        ->when($this->filter_category, function($query) {
            return $query->where('category_id', $this->filter_category);
        })->when($this->filter_status,   function($query) {
            return $query->where('status', $this->filter_status);
        })->paginate($this->paginate);

        $categories = Category::oldest('name')->get();
        $tags = Tag::oldest('name')->get();
        $statuses = collect([
            (object) ['key' => 'pending', 'label' => 'Pending'],
            (object) ['key' => 'approved', 'label' => 'Approved'],
            (object) ['key' => 'rejected', 'label' => 'Rejected'],
        ]);
        return view('livewire.dashboard.posts.post-index', compact('posts', 'categories', 'tags', 'statuses'));
    }

    public function resetData()
    {
        $this->title = null;
        $this->post_id = null;
        $this->post_item = null;
    }

    public function closeModal()
    {
        $this->resetData();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function findId(int $post_id)
    {
        $this->post_id = $post_id;
    }
    
    public function findItem($post)
    {
        $this->post_item = $post;
    }

    public function pending($id)
    {
        $post = Post::findOrFail($id);
        $post->update(['status' => 'pending']);
        $this->dispatch('alertSuccess', 'Status <b>' .$post->title. '</b> berhasil diperbarui', 'Perubahan Status');
    }
    
    public function reject($id)
    {
        $post = Post::findOrFail($id);
        $post->update(['status' => 'rejected']);
        $this->dispatch('alertSuccess', 'Status <b>' .$post->title. '</b> berhasil diperbarui', 'Perubahan Status');
    }
    
    public function approve($id)
    {
        $post = Post::findOrFail($id);
        $post->update(['status' => 'approved']);
        $this->dispatch('alertSuccess', 'Status <b>' .$post->title. '</b> berhasil diperbarui', 'Perubahan Status');
    }

    public function delete()
    {   
        Post::findOrFail($this->post_item['id'])->delete();
        $this->dispatch('alertSuccess', 'Data berhasil dihapus');
        $this->dispatchBrowserEvent('close-modal');
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
