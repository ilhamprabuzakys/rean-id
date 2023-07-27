<?php

namespace App\Http\Controllers;

use App\Models\LoginInfo;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rules\Username;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use Jenssegers\Agent\Agent;
use RealRashid\SweetAlert\Facades\Alert;
use Stevebauman\Location\Facades\Location;


class LoginController extends Controller
{
    use Authenticatable;
    protected $redirectTo = '/home';
    protected $username;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');

        $this->username = $this->findUsername();
    }

    public function findUsername()
    {
        $login = request()->input('login');
        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        request()->merge([$fieldType => $login]);

        return $fieldType;
    }

    public function username()
    {
        return $this->username;
    }

    public function index()
    {
        return view('dashboard.auth.login', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        // $ip = $request->getClientIp();
        $response = Http::get('http://ipecho.net/plain');
        $ip = $response->body();
        // $ip = '110.136.109.16';
        $location = Location::get($ip);
        // dd($ip, $location);

        $this->validate($request, [
            'login'    => 'required',
            'password' => 'required',
        ]);

        $login_type = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL)
            ? 'email'
            : 'username';

        $request->merge([
            $login_type => $request->input('login')
        ]);

        $user = User::where($login_type, $request->input($login_type))->first();
        // dd($login_type);
        // dd($user == null);
        // dd(Hash::check($request->input('password'), $user->password));
        if ($user != null) {
            if (!Hash::check($request->input('password'), $user->password)) {
                throw ValidationException::withMessages([
                    'email' => ['Kredensial yang anda masukkan salah atau tidak ditemukan.']
                ]);
            }

            if ($user->email_verified_at == \null) {
                throw ValidationException::withMessages([
                    'email' => ['Akun anda belum teraktivasi.']
                ]);
            }
        } else {
            return back()->with(
                'fails',
                'Kredensial yang anda masukkan salah atau tidak ditemukan.',
            )->withInput();
        }

        $user->createToken('user login')->plainTextToken;

        if (Auth::attempt($request->only($login_type, 'password'), $request->filled('remember'))) {
            $request->session()->regenerate();
            Auth::user()->update([
                'last_login_at' => Carbon::parse(Carbon::now())->locale('id')->isoFormat('dddd D MMMM YYYY, HH:mm:ss'),
                // 'last_login_at' => Carbon::now()->toDateTimeString(),
                'last_login_ip' => $request->getClientIp()
            ]);

            $agent = new Agent();
            $device = '';
            if ($agent->isDesktop()) {
                $device = 'Desktop';
            } elseif ($agent->isMobile()) {
                $device = 'Mobile';
            }
            if ($device == 'WebKit') {
                $device = 'Desktop';
            }

            LoginInfo::create([
                'user_id' => auth()->user()->id,
                'browser' => $agent->browser(),
                'os' => $agent->platform(),
                'device' => $device,
                'login_at' => Carbon::parse(Carbon::now())->locale('id')->isoFormat('dddd D MMMM YYYY, HH:mm:ss'),
                'login_ip' => $ip,
                'country' => $location->countryName,
                'country_code' => $location->countryCode,
                'region' => $location->regionName,
                'region_code' => $location->regionCode,
                'city' => $location->cityName,
                'zip_code' => $location->zipCode,
                'latitude' => $location->latitude,
                'longitude' => $location->longitude,
            ]);

            Alert::success('Berhasil Login!', 'Selamat datang di dashboard.');
            return redirect()->intended('/dashboard')->with('success', 'Berhasil Login!');
        }

        return back()->with(
            'fails',
            'Kredensial yang anda masukkan salah atau tidak ditemukan.',
        )->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Alert::success('Berhasil logout!', 'Terimakasih telah menggunakan layanan kami.');
        return redirect('/login')->with('success', 'Berhasil Logout, Sampai jumpa lagi!');
    }
}
