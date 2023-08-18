<?php

namespace App\Livewire\Dashboard\Users;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Post;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;

class UserIndex extends Component
{
    use WithPagination;

    public $search;
    public $rolefilter = '';
    public $paginate = 5;

    public $name, $email, $password, $role, $user_id, $user, $dataposts;
    
    protected $updatesQueryString = ['search'];
    protected $queryString = ['search' => ['except' => '']];


    public function mount()
    {
        $this->search = request()->query('search');
    }

    public function render()
    {
        $roles = collect([
            (object) ['key' => 'superadmin', 'label' => 'Super Admin'],
            (object) ['key' => 'admin', 'label' => 'Admin'],
            (object) ['key' => 'member', 'label' => 'Member'],
        ]);
        
        $query = User::with(['posts'])->latest('created_at')
        ->when($this->search, function ($query) {
            return $query->globalSearch($this->search);
        })->when($this->rolefilter, function($query) {
            return $query->where('role', $this->rolefilter);
        });

        $users = $query->paginate($this->paginate);
        
        return view('livewire.dashboard.users.user-index', [
            'users' => $users,
            // 'users' => User::with(['posts', 'login_info', 'event_logs'])->where('name', 'like', '%'.$this->search.'%')->where('role', 'like', '%'.$this->rolefilter.'%')->orderBy('updated_at', 'desc')->paginate(10),
            'roles' => $roles
        ]);
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
            'password' => \bcrypt($validatedData['password']),
        ]);
        $name = $validatedData['name'];
        $this->resetInput();
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
            'password' => \bcrypt($validatedData['password']),
        ]);
        $this->resetInput();
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
        User::find($this->user_id)->delete();
        $this->dispatch('alert', [
            'type' => 'success',
            'title' => 'Berhasil dihapus',
            'message' => 'Data berhasil dihapus'
        ]);
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
