<?php

namespace App\Http\Controllers;

use App\Mail\MailNotify;
use App\Mail\MailOtp;
use App\Models\TempUser;
use App\Models\User;
use App\Models\VerificationCode;
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

    public function code_verification(TempUser $user)
    {
        return view('auth.email-verification', [
            'title' => 'Register',
            'temp_user' => $user,
        ]);
    }

    public function verification_authenticate(Request $request, TempUser $user)
    {
        $otp = '';
        $otpM = VerificationCode::where('user_email', $user->email)->first();
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
                ]);
                $otpM->update([
                    'expired_at' => \now()
                ]);
                return redirect()->route('login')->with('success', "Your account has been <b>successfully</b> created!");
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
                'user_nama' => $user->nama,
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

            return redirect()->route('register.code_verification', $user)->with('success', "Please check your entered email <b>$user->email</b>! ");
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->getMessage())->withInput();
        }
    }
}
