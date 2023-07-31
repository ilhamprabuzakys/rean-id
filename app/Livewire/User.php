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
    public $search = '';

    public $name, $email, $password, $user_id, $user, $dataposts;
 
    public function rules() 
    {
        return [
            'name' => 'required',
            'email' => ['required', 'email', 'not_in:' . auth()->user()->email],
            'password' => 'required',
        ];
    }
 
    protected $messages = [
        'email.required' => 'Alamat email harus terisi.',
        'email.email' => 'Alamat email harus yang valid.',
        'name.required' => 'Field nama harus terisi.',
        'password.required' => 'Field password harus terisi.',
    ];
 
    protected $validationAttributes = [
        'name' => 'name',
        'email' => 'email address',
        'password' => 'password',
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
            'password' => \bcrypt($validatedData['password']),
        ]);
        toast('Data user berhasil diperbarui!','success');
        session()->flash('success', "User  <b>$this->name</b> berhasil  <b>diperbarui</b>!");
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }
    
    public function destroy()
    {
        ModelsUser::find($this->user_id)->delete();
        session()->flash('success', "User <b>$this->name</b> berhasil  <b>dihapus</b>!");
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
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $users = ModelsUser::with(['posts', 'login_info', 'event_logs'])->where('name', 'like', '%'.$this->search.'%')->where('email', 'like', '%'.$this->search.'%')->where('role', 'like', '%'.$this->search.'%')->where('username', 'like', '%'.$this->search.'%')->orderBy('updated_at', 'desc')->paginate(5);
        return view('livewire.user.user', [
            'users' => $users
        ]);
    }

}
