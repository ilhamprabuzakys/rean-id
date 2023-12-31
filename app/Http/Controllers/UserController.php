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
        return view('dashboard.users.index', [
            'title' => 'Daftar User',
        ]);
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
            'username' => ['string'],
            'role' => ['required', 'string'],
            'password' => ['required'],
        ];
    
        if (!$request->has('username')) {
            $rules['username'] = '';
        }
    
        $validator = Validator::make($request->all(), $rules, [
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email harus berformat valid, contoh: user@gmail.com',
            'email.unique' => 'Email ini telah dipakai oleh user lain.',
            'role.required' => 'Role harus diisi',
            'password.required' => 'Password nama harus diisi',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        if ($request->input('username') == '') {
            $email = $request->input('email');
            $username = Str::before($email, '@');
            $validator->after(function ($validator) use ($username) {
                $validator->getData()['username'] = $username;
            });
        }
        
        $validatedData = $validator->validated();
        $validatedData['username'] = $username;
        $user = User::create($validatedData);
        
        return redirect()->route('users.index')->with('message', "User <b>{$user->name}</b> berhasil ditambahkan!");
    }

    public function show(User $user)
    {
        return view('dashboard.users.show', [
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

        return view('dashboard.users.edit', [
            'title' => 'Edit User ' . $user->name,
        ], compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'username' => ['string'],
            'role' => ['required', 'string'],
            'password' => ['required', 'confirmed'],
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
        $roles = collect([
            (object) ['key' => 'superadmin', 'label' => 'Super Admin'],
            (object) ['key' => 'admin', 'label' => 'Admin'],
            (object) ['key' => 'member', 'label' => 'Member'],
        ]);

        return view('dashboard.users.roles', [
            'title' => 'Daftar Roles',
        ], compact('roles'));
    }
}
