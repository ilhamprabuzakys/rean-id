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
use Illuminate\Validation\ValidationException;
use Jenssegers\Agent\Agent;
use RealRashid\SweetAlert\Facades\Alert;

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
        // dd(Hash::check($request->input('password'), $user->password));
        if (!$user || !Hash::check($request->input('password'), $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.']
            ]);
        }

        $user->createToken('user login')->plainTextToken;

        if (Auth::attempt($request->only($login_type, 'password'))) {
            $request->session()->regenerate();
            Auth::user()->update([
                'last_login_at' => Carbon::now()->toDateTimeString(),
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
                'browser' => $agent->browser(),
                'os' => $agent->platform(),
                'device' => $device,
                'user_id' => auth()->user()->id,
                'login_at' => Carbon::now()->toDateTimeString(),
                'login_ip' => $request->getClientIp()
            ]);
            
            Alert::success('Berhasil Login!', 'Selamat datang di dashboard.');
            return redirect()->intended('/dashboard')->with('success', 'Login successfully!');
        }

        return back()->with(
            'fails',
            'These credentials do not match our records.',
        )->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Alert::success('Berhasil logout!', 'Terimakasih telah menggunakan layanan kami.');
        return redirect('/login')->with('success', 'Logout successfully!');
    }
}
