<?php

namespace App\Livewire\Dashboard\Security;

use App\Mail\MailOtp;
use App\Models\User;
use App\Models\VerificationCode;
use App\Rules\MatchingPassword;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class EmailChange extends Component
{
    protected $listeners = [
        "alertSuccess",
        "alertError",
        "alertInfo",
    ];

    public $current_password, $current_email, $new_email, $otp;
    public $clickSendEmail = false;
    public $current_user;

    public function mount()
    {
        $this->current_user = auth()->user();
    }

    protected $messages = [
        'new_email.required' => 'Email baru harus terisi.',
        'new_email.email' => 'Email harus berformat email, contoh: @gmail.com. @yahoo.com.',
        'new_email.min' => 'Email harus minimal 4 karakter.',
    ];
 
    protected $validationAttributes = [
        'name' => 'Name',
    ];

    public function updated($propertyName)
    {
        
        $this->validateOnly($propertyName, [
            'current_password' => [new MatchingPassword],
            'new_email' => ['min:4', 'email'],
        ]);
        
    }

    public function render()
    {
        $user_id = auth()->user()->id;
        return view('livewire.dashboard.security.email-change', compact('user_id'));
    }

    public function sendEmail()
    {
        $this->validate([
            'new_email' => ['required', 'email', 'not_in:' . auth()->user()->id]
        ]);

        $otp = \generateOTP();
        $verification_code = VerificationCode::create([
            'otp' => $otp,
            'user_email' => $this->new_email,
        ]);
        $data = [
            'user_nama' => $this->current_user['name'],
            'user_email' => $this->new_email,
            'otp' => $verification_code->otp,
        ];
        Mail::to($this->new_email)->send(new MailOtp($data));
        $this->emit('alertSuccess', 'Email berhasil dikirim!');

        // $otpM = VerificationCode::where('user_email', $this->current_user['email'])
        // ->where('expired', false)
        // ->orderBy('created_at', 'desc')->firstOrFail();
        // dd($otpM);
        // if ($otpM !== null) {
        //     $otpM->update([
        //         'expired' => true,
        //         'expired_at' => Carbon::now()->toDateTimeString()
        //     ]);
        // } else {
            
        // }
    }

    public function update()
    {
        $otp = '';
        $otpM = VerificationCode::where('user_email', $this->current_user['email'])
        ->where('expired', false)
        ->orderBy('created_at', 'desc')->first();
        try {
            $this->validate([
                'current_password' => ['required', new MatchingPassword],
                'new_email' => ['min:6', 'required', 'email'],
                'otp' => ['required'],
            ]);
            $otp = $otpM->otp;
            if ($this->otp !== $otp) {
                dd('OTP Tidak sama!', $otp, $this->otp);
            } else {
                $data = [
                    'current_password' => $this->current_password,
                    'new_email' => $this->new_email,
                    'otp' => $this->otp,
                ];
                $otpM->update([
                    'expired' => true,
                    'expired_at' => Carbon::now()->toDateTimeString()
                ]);
                User::findOrFail($this->current_user['id'])->update(['email' => bcrypt($this->email)]);
                $this->emit('alertSuccess', 'Email anda berhasil diperbarui');
                \session()->flash("success", "Email anda berhasil diperbarui");
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function resetForm()
    {
        $this->current_password = null;
        $this->new_email = null;
        $this->otp = null;
    }

    public function alertSuccess($message, $title = 'Berhasil')
    {
        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'title' => $title, 'message' => $message]);
    }
  
    public function alertError($message, $title = 'Error')
    {
        $this->dispatchBrowserEvent('alert', ['type' => 'error',  'title' => $title, 'message' => $message]);
    }
  
    public function alertInfo($message, $title = 'Informasi')
    {
        $this->dispatchBrowserEvent('alert', ['type' => 'info',  'title' => $title, 'message' => $message]);
    }
}
