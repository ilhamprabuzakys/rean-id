<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Social;
use Illuminate\Http\Request;
use App\Rules\MatchingPassword;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        $jenis_kelamin = Cache::remember('jenis_kelamin', now()->addDays(1), function () {
            $data = [
                (object) ['name' => 'Laki-laki', 'singkatan' => 'l'],
                (object) ['name' => 'Perempuan', 'singkatan' => 'p'],
            ];
            return $data;
        });

        return view('dashboard.pages.profile.profile-details', [
            'title' => 'Profile'
        ], compact('user', 'jenis_kelamin'));
    }

    public function update(Request $request, User $user)
    {
        // dd($request->all());
        $rules = [
            'avatar' => ['file', 'image', 'mimes:jpg,jpeg,png,svg', 'max:2048'],
            'username' => ['required', Rule::unique('users')->ignore($user->id)],
            'name' => ['required'],
            'notelp' => '',
            'address' => '',
        ];

        // $customMessage = [
        //     'avatar.mimes' => 'File yang kamu upload harus berformat image (PNG, JPG, JPEG).',
        // ];

        $validator = Validator::make($request->all(), $rules, [
            'avatar.mimes' => 'File yang kamu upload harus berformat image (PNG, JPG, JPEG).',
            'username.unique' => 'Username ini tidak tersedia, silahkan ganti ke yang lain.'
        ]);

        if ($validator->fails()) {
            // dd($validator->errors());
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = [];
        // dd($user->avatar);
        // Jika User sudah memiliki avatar
        if ($user->avatar !== null)
        {
            // Jika terdapat request file avatar dan request tsb berbeda dengan avatar saat ini
            if ($request->file('avatar') && ($request->file('avatar') != $user->avatar)) {
                // dd('beda anjir');

                $file = $request->file('avatar');
                $extension = $file->getClientOriginalExtension();
                $originalName = $file->getClientOriginalName();
                $timestamp = Carbon::now()->format('H:i:s_l_Y');
    
                $newFileName = $timestamp . '_' . $originalName;
                $data['avatar'] = $file->storeAs('profile-picture', $newFileName);
                Storage::delete($user->avatar);
            } elseif ($request->has('old_avatar') == $user->avatar) {
                // dd('sama anjir');
                $data['avatar'] = $user->avatar;
            }
            try {
                $validatedData = $validator->validated();
                $validatedData['avatar'] = $data['avatar'];
                // dd($validatedData);
            } catch (\Throwable $th) {
                dd($th);
            }
        } else {
            if ($request->file('avatar')) {
                $file = $request->file('avatar');
                $extension = $file->getClientOriginalExtension();
                $originalName = $file->getClientOriginalName();
                $timestamp = Carbon::now()->format('H:i:s_l_Y');
    
                $newFileName = $timestamp . '_' . $originalName;
                $data['avatar'] = $file->storeAs('profile-picture', $newFileName);
            } else {
                $data['avatar'] = null;
            }
            try {
                $validatedData = $validator->validated();
                $validatedData['avatar'] = $data['avatar'];
            } catch (\Throwable $th) {
                dd($th);
            }
        }

        $newUser = $user->update($validatedData);
        return redirect()->route('settings.profile', $user->id)->with('message', "Data Profile kamu <b>telah berhasil</b> diperbarui.");
    }

    public function social_media(User $user)
    {
        $socials = Social::orderBy('name', 'asc')->get();
        return view('dashboard.pages.profile.profile-social-media', [
            'title' => 'Sosial Media'
        ], compact('user', 'socials'));
    }

    public function social_media_update(Request $request, User $user)
    {
        $rules = [
            'facebook' => ['string', 'min:4'],
            'twitter' => ['string', 'min:4'],
            'instagram' => ['string', 'min:4'],
            'gmail' => ['string', 'min:4'],
            'youtube' => ['string', 'min:4'],
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            dd($validator->errors());
            // return redirect()->back()->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validated();
        $user->update($validatedData);

        return redirect()->route('settings.social-media', $user->id)->with('message', "Data Profile kamu <b>telah berhasil</b> diperbarui.");
    }

    public function security(User $user)
    {
        $user = Cache::remember('user', now()->addDays(1), function () use ($user) {
            return User::with(['login_info' => function ($query) {
                $query->orderBy('login_at', 'asc');
            }])->find($user->id);
        });
        

        return view('dashboard.pages.profile.security', [
            'title' => 'Keamanan'
        ], compact('user'));
    }

    public function change_password(Request $request, User $user)
    {
        $request->validate([
            'currentPassword' => ['required', new MatchingPassword],
            'newPassword' => ['required'],
            'confirmPassword' => ['same:newPassword'],
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->newPassword)]);

        return back()->with('success', 'Password berhasil diganti!');
    }
}
