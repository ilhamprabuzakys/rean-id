<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = cache()->remember('users', now()->addDays(1), function() {
            return User::with(['posts'])->orderBy('updated_at', 'desc')->get();
        });

        $roles = collect([
            (object) ['key' => 'superadmin', 'label' => 'Super Admin'],
            (object) ['key' => 'admin', 'label' => 'Admin'],
            (object) ['key' => 'member', 'label' => 'Member'],
        ]);

        confirmDelete('Apakah anda yakin untuk menghapus data user ini?', 'Data yang dihapus akan masuk ke tempat sampah.');
        return view('dashboard-borex.users.list', [
            'title' => 'Daftar Users',
        ], compact('users', 'roles'));
    }
    
    public function create()
    {
        $roles = collect([
            (object) ['key' => 'superadmin', 'label' => 'Super Admin'],
            (object) ['key' => 'admin', 'label' => 'Admin'],
            (object) ['key' => 'member', 'label' => 'Member'],
        ]);

        return view('dashboard.users.create', [
            'title' => 'Tambah Users',
        ], compact('roles'));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users')],
            'username' => ['required', 'string'],
            'password' => ['required'],
        ];
    
        if (!$request->has('username')) {
            $rules['username'] = '';
        }
    
        $validator = Validator::make($request->all(), $rules, [
            'name.required' => 'Name field is required',
        ]);
    
        if (!$request->has('username')) {
            $email = $request->input('email');
            $username = Str::before($email, '@');
            $validator->after(function ($validator) use ($username) {
                $validator->getData()['username'] = $username;
            });
        }
    
        $validatedData = $validator->validated();
        $user = User::create($validatedData);
        
        toast('Data user berhasil ditambahkan!','success');
        return redirect()->route('users.index')->with('message', "User <b>{$user->name}</b> berhasil ditambahkan!");
    }

    public function show(User $user)
    {
        return view('dashboard-borex.users.show', [
            'title' => 'Postingan User ' . $user->name,
        ], compact('user'));
    }

    public function edit(User $user)
    {
        $roles = collect([
            (object) ['key' => 'superadmin', 'label' => 'Super Admin'],
            (object) ['key' => 'admin', 'label' => 'Admin'],
            (object) ['key' => 'member', 'label' => 'Member'],
        ]);

        return view('dashboard-borex.users.edit', [
            'title' => 'Edit User ' . $user->name,
        ], compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'username' => ['required', 'string'],
            'password' => ['required'],
        ];

        if (!$request->has('username')) {
            $rules['username'] = '';
        }
    
        $validator = Validator::make($request->all(), $rules, [
            'name.required' => 'Name field is required',
        ]);
    
        if (!$request->has('username')) {
            $email = $request->input('email');
            $username = Str::before($email, '@');
            $validator->after(function ($validator) use ($username) {
                $validator->getData()['username'] = $username;
            });
        }
    
        $validatedData = $validator->validate();
        $user->update($validatedData);
        toast('Data user berhasil diperbarui!','success');
        
        return redirect()->route('users.index')->with('message', "User <b>{$user->name}</b> berhasil diperbarui!");
    }

    public function destroy(User $user)
    {
        $namaUser = $user->name;
        $user->delete();
        toast('Data user berhasil dihapus!','success');

        return redirect()->route('users.index')->with('message', "User <b>$namaUser</b> berhasil dihapus!");
    }

    public function roles()
    {
        $users = cache()->remember('users', now()->addDays(1), function() {
            return User::with(['posts'])->orderBy('updated_at', 'desc')->get();
        });

        return view('dashboard-borex.users.list', [
            'title' => 'Daftar Users',
        ], compact('users'));
    }
}
