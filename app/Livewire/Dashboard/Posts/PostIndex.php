<?php

namespace App\Livewire\Dashboard\Posts;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use DOMDocument;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class PostIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;
    public $filter_popularity = '';
    public $filter_role = '';
    public $filter_like = '';
    public $filter_category = '';
    public $paginate = 10;

    public $title, $post_id, $post_item, $filter_status, $filter_date;
    public $statusUpdate = false;

    /*     protected $updatesQueryString = ['search', 'filter_category', 'filter_status', 'filter_date'];
    protected $queryString = [
        'search' => ['except' => ''],
        'filter_category' => ['except' => ''],
        'filter_status' => ['except' => ''],
        'filter_date' => ['except' => ''],
    ];
 */
    public function render()
    {
        $query = Post::with(['category', 'tags', 'user', 'files'])->latest('created_at')
            ->when($this->search, function ($query) {
                return $query->globalSearch($this->search);
            })->when($this->filter_category, function ($query) {
                $query->whereHas('category', function ($q) {
                    return $q->where('id', $this->filter_category);
                });
            })->when($this->filter_role, function ($query) {
                $query->whereHas('user', function ($q) {
                    return $q->where('role', $this->filter_role);
                });
            })->when($this->filter_status, function ($query) {
                return $query->where('status', $this->filter_status);
            })->when($this->filter_date, function ($query) {
                $dateRange = explode(' to ', $this->filter_date);
                $startDate = $dateRange[0];
                $endDate = $dateRange[1] ?? $dateRange[0];
                return $query->whereDate('created_at', '>=', $startDate)
                    ->whereDate('created_at', '<=', $endDate);
            })->when($this->filter_popularity, function ($query) {
                switch ($this->filter_popularity) {
                    case '1-20':
                        return $query->whereBetween('views', [1, 20]);
                    case '21-50':
                        return $query->whereBetween('views', [21, 50]);
                    case '51-100':
                        return $query->whereBetween('views', [51, 100]);
                    case '100+':
                        return $query->where('views', '>', 100);
                }
            })->when($this->filter_like, function ($query) {
                switch ($this->filter_like) {
                    case '1-20':
                        return $query->whereHas('likes', function ($subQuery) {
                            $subQuery->select(DB::raw('count(*)'))
                                ->havingRaw('count(*) between 1 and 20');
                        });
                    case '21-50':
                        return $query->whereHas('likes', function ($subQuery) {
                            $subQuery->select(DB::raw('count(*)'))
                                ->havingRaw('count(*) between 21 and 50');
                        });
                    case '51-100':
                        return $query->whereHas('likes', function ($subQuery) {
                            $subQuery->select(DB::raw('count(*)'))
                                ->havingRaw('count(*) between 51 and 100');
                        });
                    case '100+':
                        return $query->whereHas('likes', function ($subQuery) {
                            $subQuery->select(DB::raw('count(*)'))
                                ->havingRaw('count(*) > 100');
                        });
                }
            });

        if (auth()->user()->role == 'admin') {
            $query = $query->whereHas('user', function ($query) {
                $query->where('role', '!=', 'superadmin');
            });
        }

        if (auth()->user()->role == 'member') {
            $query = $query->where('user_id', auth()->user()->id);
        }

        $posts = $query->paginate($this->paginate);

        $categories = Category::oldest('name')->get();
        $tags = Tag::oldest('name')->get();
        $statuses = collect([
            (object) ['key' => 'pending', 'label' => 'Pending'],
            (object) ['key' => 'approved', 'label' => 'Approved'],
            (object) ['key' => 'rejected', 'label' => 'Rejected'],
        ]);
        $roles = collect([
            (object) ['key' => 'superadmin', 'label' => 'Super Admin'],
            (object) ['key' => 'admin', 'label' => 'Admin'],
            (object) ['key' => 'member', 'label' => 'Member'],
        ]);
        return view('livewire.dashboard.posts.post-index', compact('posts', 'categories', 'tags', 'statuses', 'roles'));
    }

    public function resetData()
    {
        $this->title = null;
        $this->post_id = null;
        $this->post_item = null;
    }

    #[On('reset-filter')]
    public function resetFilter()
    {
        $this->search = '';
        $this->filter_status = '';
        $this->filter_role = '';
        $this->filter_category = '';
        $this->filter_date = '';
        $this->filter_popularity = '';
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
        $post->disableLogging();
        activity('Postingan')
            ->performedOn($post)
            ->causedBy(auth()->user())
            ->withProperties([
                'action' => 'pending',
                'post_target' => $post->id,
                'action_user' => auth()->user()->id,
                'post_author' => $post->user->id,
                'message' => auth()->user()->name . ' mengembalikan postingan ' . $post->title . ' ke status pending',
            ])
            ->event('pending')
            ->log('Postingan anda dimasukkan ke daftar review');
        $this->dispatch('refresh');
        $this->dispatch('alert', [
            'title' => 'Berhasil',
            'message' => 'Data berhasil diubah ke <b>Pending</b>',
            'type' => 'success',
        ]);
    }

    public function reject($id)
    {
        $post = Post::findOrFail($id);
        $post->update(['status' => 'rejected']);
        $post->disableLogging();
        activity('Postingan')
            ->performedOn($post)
            ->causedBy(auth()->user())
            ->withProperties([
                'action' => 'rejected',
                'post_target' => $post->id,
                'action_user' => auth()->user()->id,
                'post_author' => $post->user->id,
                'message' => auth()->user()->name . ' menolak postingan ' . $post->title,
            ])
            ->event('rejected')
            ->log('Postingan anda tidak disetujui');
        $this->dispatch('refresh');
        $this->dispatch('alert', [
            'title' => 'Berhasil',
            'message' => 'Data berhasil diubah ke <b>Rejected</b>',
            'type' => 'success',
        ]);
    }

    public function approve($id)
    {
        $post = Post::findOrFail($id);
        $post->update(['status' => 'approved']);
        $post->disableLogging();
        activity('Postingan')
            ->performedOn($post)
            ->causedBy(auth()->user())
            ->withProperties([
                'action' => 'approved',
                'post_target' => $post->id,
                'action_user' => auth()->user()->id,
                'post_author' => $post->user->id,
                'message' => auth()->user()->name . ' menyetujui postingan ' . $post->title,
            ])
            ->event('approved')
            ->log('Postingan anda disetujui');
        $this->dispatch('refresh');
        $this->dispatch('alert', [
            'title' => 'Berhasil',
            'message' => 'Data berhasil diubah ke <b>Approved</b>',
            'type' => 'success',
        ]);
    }

    public function deleteConfirmation($id)
    {
        $this->post_id = $id;
        $this->dispatch('swal:confirmation', [
            'title' => 'Postingan',
        ]);
    }

    #[On('deleteConfirmed')]
    public function destroy()
    {
        $post = Post::findOrFail($this->post_id);

        // Hapus image yang diupload sama Summernote.
        $dom = new DOMDocument();
        $dom->loadHTML($post->body, 9);
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            $path = \public_path();
            $path .= $img->getAttribute('src');
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        // Menghapus file yang terkait dengan post
        foreach ($post->files as $file) {
            // Hapus file fisik
            Storage::delete(str_replace('storage/', '', $file->file_path));
            // Hapus entri dari database
            $file->delete();
        }

        // Menghapus file media yang terkait dengan post (jika ada)
        if ($post->media) {
            if ($post->media->first()) {
                // Hapus file fisik
                Storage::delete(str_replace('storage/', '', $post->media->first()->file_path));
                // Hapus entri dari database
                $post->media->first()->delete();
            }
        }

        // Menghapus post
        $post->delete();
        $this->dispatch('alert', [
            'title' => 'Berhasil',
            'message' => 'Data berhasil dihapus',
            'type' => 'success',
        ]);
    }
}
