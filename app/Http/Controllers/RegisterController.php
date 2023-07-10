<?php

namespace App\Http\Controllers;

use App\Mail\MailNotify;
use App\Mail\MailOtp;
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
                'otp' =>$verification_code->otp,
            ];
            Mail::to($user->email)->send(new MailOtp($data));
            return redirect()->route('register.code_verification', $user)->with('success', "Kode verifikasi berhasil dikirim ke email: <b>$user->email</b>! ");
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function code_verification(TempUser $user)
    {
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
                dd('error not same otp', $otp, $validatedData['verification_code']);
            } elseif( $validatedData['verification_code'] == $otp ) {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'username' => $user->username,
                    'password' => $user->password,
                    'role' => 'member',
                    'email_verified_at' => now(),
                ]);
                $otpM->update([
                    'expired' => true,
                    'expired_at' => Carbon::now()->toDateTimeString()
                ]);
                return redirect()->route('login')->with('success', "Akun anda telah <b>berhasil</b> dibuat, silahkan login!");
            }
        } catch (\Throwable $th) {
            dd('error something went wrong', $th);
        }
    }

    public function authenticate(Request $request)
    {
        try {
            // $validatedData = $request->validate([
            //     'name' => ['required', 'max:50'],
            //     'email' => ['required', 'email:dns', 'unique:users'],
            //     // 'mobile_no' => ['required', 'string', 'max:255'],
            //     'password' => ['required', 'min:5', 'max:50', 'confirmed'],
            //     // 'password' => 'required|min:5|max:255|confirmed'
            //     'username' => ['required', 'min:4', 'max:255', 'unique:users'],
            // ]);
            $data = [];
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'max:50'],
                'auth_field' => ['required'],
                'password' => ['required', 'min:5', 'max:50', 'confirmed'],
                'username' => ['required', 'min:4', 'max:255', 'unique:users'],
                // 'email' => ['required', 'email:dns', 'unique:users'],
            ]);

            $authField = $request->input('auth_field');

            if ($validator->fails()) {
                // dd($validator->errors());
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                if (filter_var($authField, FILTER_VALIDATE_EMAIL)) {
                    $data['email'] = $authField;
                    $username = explode('@', $data['email'])[0];
                } elseif (is_numeric($authField)) {
                    $data['mobile_no'] = $authField;
                } else {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
            }
            $validatedData = $validator->validated();
            $validatedData['password'] = bcrypt($validatedData['password']);
            if ($data['email']) {
                $validatedData['email'] = $data['email'];
                $validatedData['username'] = $username;
            } elseif ($data['mobile_no']) {
                $validatedData['email'] = $data['mobile_no'];
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
                'otp' =>$verification_code->otp,
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
