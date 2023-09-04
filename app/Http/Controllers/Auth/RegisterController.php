<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\MailNotify;
use App\Mail\MailOtp;
use App\Mail\UserRegistrationMail;
use App\Models\TempUser;
use App\Models\User;
use App\Models\VerificationCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function generateOTP()
    {
        $otpLength = 6; // Jumlah digit OTP yang diinginkan
        $otp = '';

        // Menghasilkan digit acak dari 0 hingga 9 dan menggabungkannya menjadi OTP
        for ($i = 0; $i < $otpLength; $i++) {
            $otp .= random_int(0, 9);
        }

        return $otp;
    }

    public function index()
    {
        return view('auth.register', [
            'title' => 'Register',
        ]);
    }

    public function email_again(TempUser $user)
    {
        return view('auth.email-again', [
            'title' => 'Change Email Verification',
            'user' => $user
        ]);
    }

    public function email_again_authenticate(Request $request, TempUser $user)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => ['required', 'email'],
            ]);
            $validatedData = $validator->validated();
            $otpM = VerificationCode::where('user_email', $user->email)
                ->where('expired', false)
                ->orderBy('created_at', 'desc')->first();
            $otpM->update([
                'expired' => true,
                'expired_at' => Carbon::now()->toDateTimeString()
            ]);
            $email = $validatedData['email'];
            $username = explode('@', $email)[0];
            $user->update([
                'email' => $email,
                'username' => $username,
            ]);
            $data = [];
            $otp = $this->generateOTP();
            $verification_code = VerificationCode::create([
                'otp' => $otp,
                'user_email' => $user->email,
            ]);
            $data = [
                'user_nama' => $user->name,
                'user_email' => $user->email,
                'otp' => $verification_code->otp,
            ];
            Mail::to($data['user_email'])->send(new MailOtp($data));
            return redirect()->route('register.code_verification', $user)->with('success', "Kode verifikasi berhasil dikirim ke email: <b>$user->email</b>! ");
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function resend_code_verification(TempUser $user)
    {
        $otpM = VerificationCode::where('user_email', $user->email)
            ->where('expired', false)
            ->orderBy('created_at', 'desc')->first();
        $otpM->update([
            'expired' => true,
            'expired_at' => Carbon::now()->toDateTimeString()
        ]);
        $data = [];
        $otp = $this->generateOTP();
        $verification_code = VerificationCode::create([
            'otp' => $otp,
            'user_email' => $user->email,
        ]);
        $data = [
            'user_nama' => $user->name,
            'user_email' => $user->email,
            'otp' => $verification_code->otp,
        ];
        Mail::to($data['user_email'])->send(new MailOtp($data));
        return redirect()->route('register.code_verification', $user)->with('success', "Kode verifikasi berhasil dikirim ulang ke email: <b>$user->email</b>! ");
    }

    public function code_verification(TempUser $user, Request $request)
    {
        if ($request->input('resend') == 'true') {
            // kode untuk mengirim ulang verifikasi
            $otpM = VerificationCode::where('user_email', $user->email)
                ->where('expired', false)
                ->orderBy('created_at', 'desc')->first();
            $otpM->update([
                'expired' => true,
                'expired_at' => Carbon::now()->toDateTimeString()
            ]);
            $data = [];
            $otp = $this->generateOTP();
            $verification_code = VerificationCode::create([
                'otp' => $otp,
                'user_email' => $user->email,
            ]);
            $data = [
                'user_nama' => $user->name,
                'user_email' => $user->email,
                'otp' => $verification_code->otp,
            ];
            Mail::to($data['user_email'])->send(new MailOtp($data));
            session()->flash('success', "Kode verifikasi berhasil dikirim ulang ke email: <b>$user->email</b>!");
            // Redirect back to the same route without query string
            return redirect(route('register.code_verification', $user));
        }
        return view('auth.email-verification', [
            'title' => 'Verify Your Email',
            'temp_user' => $user,
        ]);
    }

    public function verification_authenticate(Request $request, TempUser $user)
    {
        $otp = '';
        $otpM = VerificationCode::where('user_email', $user->email)
            ->where('expired', false)
            ->orderBy('created_at', 'desc')->first();
        $otp = $otpM->otp;
        try {
            $validator = Validator::make($request->all(), [
                'verification_code' => ['required', 'numeric'],
            ]);
            $validatedData = $validator->validated();
            if ($validatedData['verification_code'] != $otp) {
                return redirect()->back()->with('fails', "Kode OTP yang anda masukkan tidak valid");
            } elseif ($validatedData['verification_code'] == $otp) {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'username' => $user->username,
                    'password' => $user->password,
                    'role' => 'member',
                    'email_verified_at' => now(),
                ]);
                $data = [
                    'name' => $user->name,
                    'email' => $user->email,
                    'username' => explode('@', $user->email)[0],
                    'password' => explode('@', $user->email)[0],
                ];
                Mail::to($newUser->email)->send(new UserRegistrationMail($data));
                activity('Registration')
                    ->causedBy($newUser)
                    ->withProperties([
                        'action' => 'registration',
                        'action_user' =>  $newUser->id,
                        'message' => 'Akun anda berhasil dibuat melalui registrasion email.',
                    ])
                    ->event('registration')
                    ->log('Akun anda berhasil dibuat');
                $otpM->update([
                    'expired' => true,
                    'expired_at' => Carbon::now()->toDateTimeString()
                ]);
                return redirect()->route('login')->with('success', "Akun anda telah <b>berhasil</b> dibuat, silahkan login!");
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('fails', "Kode OTP yang anda masukkan tidak valid");
        }
    }

    public function authenticate(Request $request)
    {
        // dd($request->all());
        try {
            // $validatedData = $request->validate([
            //     'name' => ['required', 'max:50'],
            //     'email' => ['required', 'email:dns', 'unique:users'],
            //     // 'mobile_no' => ['required', 'string', 'max:255'],
            //     'password' => ['required', 'min:5', 'max:50', 'confirmed'],
            //     // 'password' => 'required|min:5|max:255|confirmed'
            //     'username' => ['required', 'min:4', 'max:255', 'unique:users'],
            // ]);
            $rules = [
                'name' => ['required', 'max:50'],
                'email' => ['required', 'email', 'unique:users'],
                'password' => ['required', 'min:5', 'max:50', 'confirmed'],
                // 'email' => ['required', 'email:dns', 'unique:users'],
            ];
            if ($request->input('username') !== null) {
                $rules = [
                    'name' => ['required', 'max:50'],
                    'email' => ['required'],
                    'password' => ['required', 'min:5', 'max:20', 'confirmed'],
                    'username' => ['min:4', 'max:255', 'unique:users'],
                ];
            }
            $data = [];
            $validator = Validator::make($request->all(), $rules, [
                'email.required' => 'Email harus diisi.',
                'email.email' => 'Email harus berformat email, ada "@" nya.',
                'name.required' => 'Nama harus diisi.',
                'name.max' => 'Nama tidak boleh lebih dari 50 karakter.',
                'password.required' => 'Password harus diisi.',
                'password.min' => 'Password minimal itu 5 karakter.',
                'password.max' => 'Password maksimal itu 20 karakter.',
                'password.confirmed' => 'Password anda tidak cocok.',
            ]);

            if ($validator->fails()) {
                // dd($validator->errors());
                return redirect()->back()->withErrors($validator)->withInput();
            } 
            $validatedData = $validator->validated();
            $validatedData['password'] = bcrypt($validatedData['password']);
            if ($request->input('email')) {
                $validatedData['email'] = $request->input('email');
                if ($request->input('username') == '') {
                    $validatedData['username'] = explode('@', $validatedData['email'])[0];
                }
            } 
            // dd($validatedData);
            $user = TempUser::create($validatedData);
            $otp = $this->generateOTP();
            $verification_code = VerificationCode::create([
                'otp' => $otp,
                'user_email' => $user->email,
            ]);
            $data = [
                'user_nama' => $user->name,
                'user_email' => $user->email,
                'otp' => $verification_code->otp,
            ];
            Mail::to($user->email)->send(new MailOtp($data));
            // dd($user);


            /* $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => $validatedData['password'],
                'username' => $username,
                // 'mobile_no' => $validatedData['mobile_no'],
            ]); */

            return redirect()->route('register.code_verification', $user)->with('success', "Kode verifikasi berhasil dikirim ke email: <b>$user->email</b>! ");
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->getMessage())->withInput();
        }
    }
}
