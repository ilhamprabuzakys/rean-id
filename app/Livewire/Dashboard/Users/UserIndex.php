<?php

namespace App\Livewire\Dashboard\Users;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\Models\Conversation;
use App\Models\Message;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Post;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class UserIndex extends Component
{
    use WithPagination, WithFileUploads;

    public $search, $filter_date;
    public $rolefilter = '';
    public $paginate = 5;
    public $file;

    public $name, $email, $password, $role, $user_id, $user, $dataposts;

    #[On('refresh')]
    public function render()
    {
        $roles = collect([
            (object) ['key' => 'superadmin', 'label' => 'Super Admin'],
            (object) ['key' => 'admin', 'label' => 'Admin'],
            (object) ['key' => 'member', 'label' => 'Member'],
        ]);

        $query = User::with(['posts'])->latest('updated_at')
            ->when($this->search, function ($query) {
                return $query->globalSearch($this->search);
            })->when($this->rolefilter, function ($query) {
                return $query->where('role', $this->rolefilter);
            })->when($this->filter_date, function ($query) {
                $dateRange = explode(' to ', $this->filter_date);
                $startDate = $dateRange[0];
                $endDate = $dateRange[1] ?? $dateRange[0];

                return $query->whereDate('created_at', '>=', $startDate)
                    ->whereDate('created_at', '<=', $endDate);
            });

        $users = $query->paginate($this->paginate);

        return view('livewire.dashboard.users.user-index', [
            'users' => $users,
            'roles' => $roles
        ]);
    }

    public function exportExcel()
    {
        return Excel::download(new UsersExport, 'daftar-user.xlsx');
    }

    public function importExcel()
    {
        // dd($this->file->getRealPath());
        try {
            Excel::import(new UsersImport, $this->file->getRealPath());

            activity('User')  // Anda dapat mengganti 'custom_log' dengan nama log yang Anda inginkan
                ->causedBy(auth()->user())
                ->withProperties([
                    'message' => 'Berhasil mengimport data User',
                ])
                ->event('imported')
                ->log(auth()->user()->name . ' mengimport data user');
            // Tampilkan pesan setelah berhasil import
            $this->dispatch('alert', [
                'type' => 'success',
                'title' => 'Berhasil import',
                'message' => 'Data User berhasil diperbarui'
            ]);
            $this->dispatch('swal:modal', [
                'icon' => 'success',
                'title' => 'Berhasil import',
                'text' => 'Data User berhasil diperbarui, password akan diset default menjadi <br><b>password123</b>'
            ]);
            $this->dispatch('refresh');
            $this->file = null;
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function updatedFile()
    {
        $this->importExcel();
    }


    public function rules()
    {
        return [
            'name' => 'required',
            'email' => ['required', 'email', 'not_in:' . auth()->user()->email, Rule::unique('users')->ignore($this->user_id)],
            'password' => 'required',
            'role' => 'required',
        ];
    }

    protected $messages = [
        'email.required' => 'Alamat email harus terisi.',
        'email.email' => 'Alamat email harus berformat email, contoh: @gmail.com, @yahoo.com.',
        'email.unique' => 'Alamat email ini telah digunakan.',
        'name.required' => 'Nama harus terisi.',
        'password.required' => 'Password harus terisi.',
        'role.required' => 'Role harus dipilih.',
    ];

    protected $validationAttributes = [
        'name' => 'name',
        'email' => 'email address',
        'password' => 'password',
        'role' => 'role',
    ];

    public function updated($propertyName)
    {
        if ($propertyName == 'email') {
            $this->validateOnly($propertyName);
        }
    }

    public function store()
    {
        $validatedData = $this->validate();
        $validatedData['username'] = Str::before($validatedData['email'], '@');
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'username' => $validatedData['username'],
            'role' => $validatedData['role'],
            'password' => $validatedData['password'],
            'email_verified_at' => \now()
        ]);
        $name = $validatedData['name'];
        $this->resetInput();
        $this->dispatch('refresh');
        $this->dispatch('alert', [
            'type' => 'success',
            'title' => 'Berhasil ditambahkan',
            'message' => 'Data berhasil ditambahkan'
        ]);
        $this->dispatch('close-modal');
        // $this->dispatch('userStore');
    }

    public function update()
    {
        $validatedData = $this->validate();
        $validatedData['username'] = Str::before($validatedData['email'], '@');
        User::where('id', $this->user_id)->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'username' => $validatedData['username'],
            'role' => $validatedData['role'],
            'password' => $validatedData['password'],
        ]);
        $this->resetInput();
        $this->dispatch('refresh');
        $this->dispatch('alert', [
            'type' => 'success',
            'title' => 'Berhasil diperbarui',
            'message' => 'Data berhasil diperbarui'
        ]);
        $this->dispatch('close-modal');
    }

    public function deleteConfirmation($id)
    {
        $this->user_id = $id;
        $this->dispatch('swal:confirmation', [
            'title' => 'User'
        ]);
    }

    #[On('deleteConfirmed')]
    public function destroy()
    {
        $user = User::find($this->user_id);
        // Hapus semua conversations dimana user adalah sender
        Conversation::where('sender_id', $user->id)->delete();
        // Hapus semua conversations dimana user adalah receiver
        Conversation::where('receiver_id', $user->id)->delete();

        // Hapus semua messages dimana user adalah sender
        Message::where('sender_id', $user->id)->delete();
        // Hapus semua messages dimana user adalah receiver
        Message::where('receiver_id', $user->id)->delete();

        // Kemudian hapus user
        $user->delete();
        $this->dispatch('alert', [
            'type' => 'success',
            'title' => 'Berhasil dihapus',
            'message' => 'Data berhasil dihapus'
        ]);
        $this->dispatch('refresh');
    }

    public function editUser(int $user_id)
    {
        $user = User::find($user_id);
        if ($user) {
            $this->user_id = $user->id;
            $this->name = $user->name;
            $this->email = $user->email;
            $this->password = $user->password;
            $this->role = $user->role;
        } else {
            return back();
        }
    }

    public function postinganTerkait(int $user_id)
    {
        $user = User::find($user_id);
        if ($user) {
            $this->user_id = $user->id;
            $this->name = $user->name;
            $this->dataposts = \App\Models\Post::where('user_id', $user->id)->orderBy('updated_at', 'desc')->get();
        } else {
            return back();
        }
    }

    public function findUser(int $user_id)
    {
        $this->user_id = $user_id;
    }

    public function resetInput()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->role = '';
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function activate($id)
    {
        $user = User::find($id);
        $user->update(['active' => TRUE]);
        $this->dispatch('alert', [
            'title' => 'Berhasil',
            'message' => 'Akun User ' . $user->name . ' berhasil <strong>diaktifkan</strong>',
            'type' => 'success',
        ]);
        $this->dispatch('refresh');
    }

    public function deactivate($id)
    {
        $user = User::find($id);
        $user->update(['active' => FALSE]);
        $this->dispatch('alert', [
            'title' => 'Berhasil',
            'message' => 'Akun User <strong>' . $user->name . '</strong> berhasil <strong>dinonaktifkan</strong>',
            'type' => 'success',
        ]);
        $this->dispatch('refresh');
    }
}
