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
                'text' => 'Harap masukkan <strong>kredensial</strong> anda sebelum login'
            ]);
        } else {
            try {
                $this->validate();
    
                $login_type = filter_var($this->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
    
                $user = User::where($login_type, $this->login)->first();
                if (!$user) {
                    return $this->failedLoginResponse('Kredensial yang anda masukkan <strong>salah</strong> atau <strong>tidak ditemukan</strong>');
                }
    
                if (!Hash::check($this->password, $user->password)) {
                    return $this->failedLoginResponse('Kredensial yang anda masukkan <strong>salah</strong> atau <strong>tidak ditemukan</strong>');
                }
    
                if ($user->email_verified_at === null) {
                    return $this->failedLoginResponse('Akun anda <strong>dibekukan</strong> atau telah <strong>dinonaktifkan</strong> sementara');
                }
    
                if ($user->active == 0) {
                    return $this->failedLoginResponse('Akun telah <strong>dinonaktifkan</strong> karena <strong>melanggar</strong> ketentuan komunitas kami. Hubungi admin jika ini merupakan suatu <strong>kesalahan</strong>.');
                }
    
                $user->createToken('user login')->plainTextToken;
    
                $credentials = [$login_type => $this->login, 'password' => $this->password];
                if (!Auth::attempt($credentials, $this->remember)) {
                    return $this->failedLoginResponse('Kredensial yang anda masukkan <strong>salah</strong> atau <strong>tidak ditemukan</strong>');
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
}
