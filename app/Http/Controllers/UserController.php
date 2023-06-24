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
        $users = Cache::remember('users', function() {
            return User::with(['users'])->orderBy('updated_at', 'desc')->get();
        });

        return view('dashboard.users.index', [
            'title' => 'Daftar Users',
        ], compact('users'));
    }

    public function create()
    {
        return view('dashboard.users.create', [
            'title' => 'Tambah Users',
        ]);
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
        return view('dashboard.users.show', [
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
    
        return redirect()->route('users.index')->with('message', "User <b>{$user->name}</b> berhasil diperbarui!");
    }

    public function destroy(User $user)
    {
        $namaUser = $user->name;
        $user->delete();

        return redirect()->route('users.index')->with('message', "User <b>$namaUser</b> berhasil dihapus!");
    }
}
