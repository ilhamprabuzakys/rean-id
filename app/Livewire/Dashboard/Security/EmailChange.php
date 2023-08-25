<?php

namespace App\Livewire\Dashboard\Security;

use App\Mail\MailOtp;
use App\Models\User;
use App\Models\VerificationCode;
use App\Rules\MatchingPassword;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class EmailChange extends Component
{
    public $current_password, $current_email, $new_email, $otp;
    public $clickSendEmail = false;
    public $otpSended = false;

    protected $messages = [
        'current_password.required' => 'Password saat ini harus diisi.',
        'otp.required' => 'Kode OTP tidak boleh kosong.',
        'new_email.required' => 'Email baru harus terisi.',
        'new_email.email' => 'Email harus berformat email, contoh: @gmail.com. @yahoo.com.',
        'new_email.not_in' => 'Alamat email yang anda masukkan tidak boleh sama dengan alamat email anda saat ini.',
        'new_email.min' => 'Email harus minimal 4 karakter.',
    ];

    protected $validationAttributes = [
        'name' => 'Name',
    ];

    public function updated($propertyName)
    {

        $this->validateOnly($propertyName, [
            // 'current_password' => [new MatchingPassword],
            'new_email' => ['min:4', 'email'],
        ]);
    }

    public function render()
    {
        return view('livewire.dashboard.security.email-change');
    }

    public function sendEmail()
    {
        try {
            $this->validate([
                'new_email' => ['required', 'email', 'not_in:' . auth()->user()->email]
            ]);

            // Cek dijika user sudah mengirim request OTP ke email yang baru ini.
            $otp_old = VerificationCode::where('user_email', $this->new_email)
                ->where('expired', false)
                ->orderBy('created_at', 'desc')->first();

            if ($otp_old) {
                $otp_old->delete();
            }

            $otp = \generateOTP();
            $verification_code = VerificationCode::create([
                'otp' => $otp,
                'user_email' => $this->new_email,
            ]);
            $data = [
                'user_nama' => auth()->user()->name,
                'user_email' => $this->new_email,
                'otp' => $verification_code->otp,
            ];
            Mail::to($this->new_email)->send(new MailOtp($data));
            $this->dispatch('swal:modal', [
                'title' => 'Berhasil',
                'text' => 'Kode OTP Berhasil dikirim ke email baru anda:<br><b>' . $this->new_email . '</b>',
                'icon' => 'success',
            ]);
            $this->otpSended = true;
        } catch (ValidationException $e) {
            $this->dispatch('swal:modal', [
                'icon' => 'error',
                'title' => 'Terjadi Kesalahan',
                'text' => 'Ada beberapa kesalahan pada proses anda:<br>' . \getErrorsString($e)
            ]);
            // Mengirim error bag ke komponen Livewire
            $this->setErrorBag($e->validator->getMessageBag());
        }
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
        if ($this->new_email == null && $this->current_password == null && $this->otp == null) {
            $this->dispatch('swal:modal', [
                'icon' => 'error',
                'title' => 'Terjadi Kesalahan',
                'text' => 'Jika anda ingin merubah email harap isi semua data yang diperlukan.'
            ]);
        } else {
            $otp = '';
            $otpM = VerificationCode::where('user_email', $this->new_email)
                ->where('expired', false)
                ->orderBy('created_at', 'desc')->first();
            if ($otpM) {
                try {
                    $this->validate([
                        'current_password' => ['required', new MatchingPassword],
                        'new_email' => ['min:6', 'required', 'email'],
                        'otp' => ['required'],
                    ]);
                    $otp = $otpM->otp;
                    if ($this->otp !== $otp) {
                        $this->addError('otp', 'OTP yang anda masukkan tidak tepat, tolong periksa kembali.');
                        // dd($this->getErrorBag());
                        $this->dispatch('swal:modal', [
                            'icon' => 'error',
                            'title' => 'Terjadi Kesalahan',
                            'text' => 'Ada beberapa kesalahan pada proses anda:<br>' . \getErrorsString($this->getErrorBag())
                        ]);
                    } else {
                        $otpM->update([
                            'expired' => true,
                            'expired_at' => Carbon::now()->toDateTimeString()
                        ]);
                        auth()->user()->update(['email' => $this->new_email]);
                        $this->resetForm();
                        $this->dispatch('swal:modal', [
                            'icon' => 'success',
                            'title' => 'Berhasil',
                            'text' => 'Email anda berhasil diubah menjadi:<br><b>' . auth()->user()->email . '</b>'
                        ]);
                    }
                } catch (ValidationException $e) {
                    $this->dispatch('swal:modal', [
                        'icon' => 'error',
                        'title' => 'Terjadi Kesalahan',
                        'text' => 'Ada beberapa kesalahan pada input Anda:<br>' . \getErrorsString($e)
                    ]);
                    // Mengirim error bag ke komponen Livewire
                    $this->setErrorBag($e->validator->getMessageBag());
                }
            } else {
                $this->dispatch('swal:modal', [
                    'icon' => 'error',
                    'title' => 'Terjadi Kesalahan',
                    'text' => 'Kode OTP tidak ditemukan, Harap ulangi kembali proses dengan meminta kembali OTP'
                ]);
                // Mengirim error bag ke komponen Livewire
                $this->addError('otp', 'OTP tidak valid, harap kirim ulang OTP.');
            }
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
