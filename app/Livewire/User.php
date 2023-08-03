<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\Validator;
use Livewire\WithPagination;

class User extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    public $rolefilter = '';
    public $paginate = 5;

    public $name, $email, $password, $role, $user_id, $user, $dataposts;
    
    protected $updatesQueryString = ['search'];

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
        
        $users = $this->search === null ? ModelsUser::query()->when($this->rolefilter, function($query) {
            return $query->where('role', $this->rolefilter);
        })
        ->orderBy('updated_at', 'desc')
        ->paginate($this->paginate) : ModelsUser::query()->when($this->rolefilter, function($query) {
            return $query->where('role', $this->rolefilter);
        })
        ->where('name', 'like', '%' . $this->search . '%')
        ->orderBy('updated_at', 'desc')
        ->paginate($this->paginate);
        
        return view('livewire.user.user', [
            'users' => $users,
            // 'users' => ModelsUser::with(['posts', 'login_info', 'event_logs'])->where('name', 'like', '%'.$this->search.'%')->where('role', 'like', '%'.$this->rolefilter.'%')->orderBy('updated_at', 'desc')->paginate(10),
            'roles' => $roles
        ]);
    }

    public function rules() 
    {
        return [
            'name' => 'required',
            'email' => ['required', 'email', 'not_in:' . auth()->user()->email],
            'password' => 'required',
            'role' => 'required',
        ];
    }
 
    protected $messages = [
        'email.required' => 'Alamat email harus terisi.',
        'email.email' => 'Alamat email harus yang valid.',
        'name.required' => 'Field nama harus terisi.',
        'password.required' => 'Field password harus terisi.',
        'role.required' => 'Field role harus dipilih.',
    ];
 
    protected $validationAttributes = [
        'name' => 'name',
        'email' => 'email address',
        'password' => 'password',
        'role' => 'role',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $validatedData = $this->validate();
        $validatedData['username'] = Str::before($validatedData['email'], '@');
        ModelsUser::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'username' => $validatedData['username'],
            'role' => $validatedData['role'],
            'password' => \bcrypt($validatedData['password']),
        ]);
        $name = $validatedData['name'];
        toast('Data user berhasil ditambahkan!','success');
        session()->flash('success', "User  <b>$name</b>  berhasil  <b>ditambahkan</b> !");
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        // $this->emit('userStore');
    }

    public function update()
    {
        $validatedData = $this->validate();
        $validatedData['username'] = Str::before($validatedData['email'], '@');
        ModelsUser::where('id', $this->user_id)->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'username' => $validatedData['username'],
            'role' => $validatedData['role'],
            'password' => \bcrypt($validatedData['password']),
        ]);
        toast('Data user berhasil diperbarui!','success');
        session()->flash('success', "User {<b>$this->name</b>} berhasil diperbarui!");
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }
    
    public function destroy()
    {
        ModelsUser::find($this->user_id)->delete();
        session()->flash('success', "User {<b>$this->name</b>} berhasil  <b>dihapus</b>!");
        $this->dispatchBrowserEvent('close-modal');
    }

    public function editUser(int $user_id) 
    {
        $user = ModelsUser::find($user_id);
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
        $user = ModelsUser::find($user_id);
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

}
