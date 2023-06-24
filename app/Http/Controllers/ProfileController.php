<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        $user = Cache::remember('user', now()->addDays(1), function() use ($user) {
            return $user;
        });

        $jenis_kelamin = Cache::remember('jenis_kelamin', now()->addDays(1), function() {
            $data = [
                (object) ['name' => 'Laki-laki', 'singkatan' => 'l'],
                (object) ['name' => 'Perempuan', 'singkatan' => 'p'],
            ];
            return $data;
        });

        return view('dashboard.profile.index', [
            'title' => 'Profile'
        ], compact('user', 'jenis_kelamin'));
    }

    public function update(Request $request, User $user)
    {
        $rules = [
            'profile_path' => ['image', 'max:2048'],
            'username' => ['required'],
            'name' => ['required'],
            'no_anggota' => [''],
            'jenis_kelamin' => [''],
            'tempat_lahir' => [''],
            'tanggal_lahir' => ['date'],
            'domisili' => [''],
            'email' => [''],
            'no_ktp' => [''],
            'pendidikan_terakhir' => [''],
            'mobile_no' => [''],
            'asal_instansi' => [''],
            'kelompok' => [''],
            'media_sosial' => [''],
            'user_level' => [''],
            'group_name' => [''],
            // 'slug' => ['required', 'min:4', Rule::unique('mangas')->ignore($manga->id)],
        ];

        $validatedData = $request->validate($rules);
        $data = $request->except(['_token', '_method', 'oldprofile_path']);

        if ($request->hasFile('profile_path')) {
            if ($request->oldprofile_path) {
                Storage::delete($request->oldprofile_path);
            }
            $imagePath = $request->file('profile_path')->store('user-profile');
            $data['profile_path'] = $imagePath;
        } else {
            $data['profile_path'] = $user->profile_path;
        }
        $newUser = $user->update($data);
        dd($newUser);
        // $oldTitle = $user->name;

        return redirect()->route('profile.index', $user->id)->with('message', "Data Profile kamu <b>telah berhasil</b> diperbarui.");
    }

    public function password(User $user)
    {
        $user = Cache::remember('user', now()->addDays(1), function() use ($user) {
            return $user;
        });
        return view('dashboard.profile.password', [
            'title' => 'Change Password'
        ], compact('user'));
    }
    
    public function update_password(Request $request, User $user)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed',
        ]);
        if ($validator->fails()) {
            dd($validator->errors());
            // return redirect()->back()->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validated();

        // dd(!Hash::check($request->input('current_password'), $user->password));
        // dd($validatedData);

        if (!Hash::check($request->input('current_password'), $user->password)) {
            $user->update([
                'password' => bcrypt($validatedData['password']),
            ]);
        } else {
            dd('gagal');
        }
        // $user->update($validatedData);
        
        // dd($user);

        return redirect()->route('profile.index', $user)->with('message', "Password anda telah berhasil <b>diperbarui!</b>");
        
    }
}
