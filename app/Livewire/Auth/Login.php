<?php

namespace App\Livewire\Auth;

use App\Models\LoginInfo;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Jenssegers\Agent\Agent;
use Livewire\WithPagination;
use Livewire\Component;
use Stevebauman\Location\Facades\Location;

class Login extends Component
{
    public $login, $password, $remember;
    public $passwordToggle = 1;

    public function authenticate()
    {
        $ip = $this->getPublicIP();
        $location = Location::get($ip);

        $this->validate([
            'login'    => 'required',
            'password' => 'required',
        ]);

        // dd($this->all());
        $login_type = filter_var($this->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $user = User::where($login_type, $this->login)->first();
        if ($user != null) {
            if (!Hash::check($this->password, $user->password)) {
                $this->dispatch('swal:modal', [
                    'icon' => 'error',
                    'title' => 'Gagal Login',
                    'text' => 'Periksa kembali data mu'
                ]);
                session()->flash('fails', 'Kredensial yang anda masukkan salah atau tidak ditemukan.');
                return;
            }

            if ($user->email_verified_at == null) {
                $this->dispatch('swal:modal', [
                    'icon' => 'error',
                    'title' => 'Akun anda belum teraktivasi',
                    'text' => 'Periksa kembali data mu'
                ]);
                session()->flash('fails', 'Akun anda belum teraktivasi.');
                return;
            }

            if ($user->active == 0) {
                $this->dispatch('swal:modal', [
                    'icon' => 'error',
                    'title' => 'Akun anda telah dinonaktifkan',
                    'text' => 'Akun telah dinonaktifkan karena melanggar ketentuan komunitas kami. Hubungi admin jika ini merupakan suatu kesalahan'
                ]);
                session()->flash('fails', 'Akun telah dinonaktifkan karena melanggar ketentuan komunitas kami. Hubungi admin jika ini merupakan suatu kesalahan.');
                return;
            }
        } else {
            $this->dispatch('swal:modal', [
                'icon' => 'error',
                'title' => 'Login gagal',
                'text' => 'Kredensial yang anda masukkan salah atau tidak ditemukan'
            ]);
            session()->flash('fails', 'Kredensial yang anda masukkan salah atau tidak ditemukan.');
            return;
        }


        $user->createToken('user login')->plainTextToken;

        if (Auth::attempt([$login_type => $this->login, 'password' => $this->password], $this->remember)) {

            auth()->user()->update([
                'last_login_at' => Carbon::parse(Carbon::now())->locale('id')->isoFormat('dddd D MMMM YYYY, HH:mm:ss'),
                'last_login_ip' => request()->ip()
            ]);

            $agent = new Agent();
            $device = $agent->isDesktop() ? 'Desktop' : ($agent->isMobile() ? 'Mobile' : 'WebKit');

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
            $this->dispatch('swal:modal', [
                'icon' => 'success',
                'title' => 'Berhasil Login',
                'text' => 'Akan diredirect ke dashboard',
                'duration' => 3000,
            ]);
            return redirect()->intended('/dashboard');
        }

        $this->dispatch('swal:modal', [
            'icon' => 'error',
            'title' => 'Gagal Login',
            'text' => 'Periksa kembali data mu'
        ]);
        session()->flash('fails', 'Kredensial yang anda masukkan salah atau tidak ditemukan.');
    }

    private function getPublicIP()
    {
        // Logic untuk mendapatkan IP public.
        $response = Http::get('http://ipecho.net/plain');
        return $response->body();
    }

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function changePasswordToggle()
    {
        if ($this->passwordToggle == 1) {
            $this->passwordToggle = 0;
        } elseif ($this->passwordToggle == 0) {
            $this->passwordToggle = 1;
        }
    }
}
