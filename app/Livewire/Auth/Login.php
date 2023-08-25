<?php

namespace App\Livewire\Auth;

use App\Livewire\Dashboard\Chats\ChatCreate;
use App\Livewire\Dashboard\Chats\ChatList;
use App\Models\LoginInfo;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use Jenssegers\Agent\Agent;
use Livewire\WithPagination;
use Livewire\Component;
use Stevebauman\Location\Facades\Location;

class Login extends Component
{
    public $login, $password, $remember;
    public $passwordToggle = 1;

    protected function rules()
    {
        return [
            'login'    => 'required',
            'password' => 'required',
        ];
    }

    protected $messages = [
        'login.required' => 'Harap masukan kredensial anda',
        'password.required' => 'Harap masukan password anda',
    ];

    protected $validationAttributes = [
        'login' => 'Kredensial',
        'password' => 'Password',
    ];


    public function render()
    {
        return view('livewire.auth.login');
    }

    public function authenticate()
    {
        if ($this->login == null && $this->password == null)
        {
            $this->dispatch('swal:modal', [
                'icon' => 'error',
                'title' => 'Login Gagal',
                'text' => 'Harap masukkan kredensial anda sebelum login'
            ]);
        } else {
            try {
                $this->validate();
    
                $login_type = filter_var($this->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
    
                $user = User::where($login_type, $this->login)->first();
                if (!$user) {
                    return $this->failedLoginResponse('Kredensial yang anda masukkan salah atau tidak ditemukan');
                }
    
                if (!Hash::check($this->password, $user->password)) {
                    return $this->failedLoginResponse('Kredensial yang anda masukkan salah atau tidak ditemukan');
                }
    
                if ($user->email_verified_at === null) {
                    return $this->failedLoginResponse('Akun anda belum dibekukan atau terkena dinonaktifkan sementara');
                }
    
                if ($user->active == 0) {
                    return $this->failedLoginResponse('Akun telah dinonaktifkan karena melanggar ketentuan komunitas kami. Hubungi admin jika ini merupakan suatu kesalahan.');
                }
    
                $user->createToken('user login')->plainTextToken;
    
                $credentials = [$login_type => $this->login, 'password' => $this->password];
                if (!Auth::attempt($credentials, $this->remember)) {
                    return $this->failedLoginResponse('Kredensial yang anda masukkan salah atau tidak ditemukan');
                }
    
                $this->dispatch('refresh')->to(ChatList::class);
                $this->dispatch('refresh')->to(ChatCreate::class);
                $this->dispatch('swal:modal', [
                    'icon' => 'success',
                    'title' => 'Login berhasil',
                    'text' => 'Akan diredirect ke dashboard',
                    'duration' => 3000,
                ]);
                
                \saveUserLoginInfo();
                return redirect()->intended('/dashboard');
            } catch (ValidationException $e) {
                $errorMessage = \getErrorsString($e);
                $this->failedLoginResponse('Terjadi kesalahan, periksa kembali data anda:<br>' . $errorMessage);
            }
        }
    }

    protected function failedLoginResponse($message)
    {
        $this->dispatch('swal:modal', [
            'icon' => 'error',
            'title' => 'Login Gagal',
            'text' => $message
        ]);

        session()->flash('fails', $message);
    }

    protected function saveLoginInfo($now)
    {
        $ip = $this->getPublicIP();
        $location = Location::get($ip);
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
    }

    private function getPublicIP()
    {
        // Logic untuk mendapatkan IP public.
        $response = Http::get('http://ipecho.net/plain');
        return $response->body();
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
