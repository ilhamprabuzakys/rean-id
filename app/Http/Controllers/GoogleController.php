<?php

namespace App\Http\Controllers;

use App\Models\LoginInfo;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Agent;
use Laravel\Socialite\Facades\Socialite;
use Stevebauman\Location\Facades\Location;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        try {
            $oauthUser = Socialite::driver('google')->user();
            $findUser = User::where('google_id', $oauthUser->getId())->first();
            if ($findUser) {
                Auth::login($findUser);
                \saveUserLoginInfo();
                return redirect()->intended('dashboard');
            } else {
                $newUser = User::create([
                    'name' => $oauthUser->getName(),
                    'email' => $oauthUser->getEmail(),
                    'username' => explode('@', $oauthUser->getEmail())[0],
                    'google_id' => $oauthUser->getId(),
                    // password tidak akan digunakan ;)
                    'password' => \bcrypt(explode('@', $oauthUser->getEmail())[0]),
                    'avatar' => $oauthUser->avatar,
                    'email_verified_at' => now(),
                ]);
                $newUser->disableLogging();
                /* activity('Registration')
                    ->causedBy($newUser)
                    ->withProperties([
                        'action' => 'registration',
                        'action_user' =>  $newUser->id,
                        'message' => 'Akun anda berhasil dibuat',
                    ])
                    ->event('registration')
                    ->log('Akun anda berhasil dibuat'); */
                Auth::login($newUser);
                \saveUserLoginInfo();
                return redirect()->intended('dashboard');
            }
        } catch (\Throwable $th) {
            dd('error', $th);
        }
    }
}
