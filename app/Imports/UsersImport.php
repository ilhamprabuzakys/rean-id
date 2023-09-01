<?php

namespace App\Imports;

use App\Mail\UserRegistrationMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // dd($row);
        // Cek apakah user dengan email ini sudah ada
        $existingUser = User::where('email', $row['email'])->where('username', $row['username'])->first();

        if (!$existingUser) {
            // Nonaktifkan logging untuk model User
            $user = User::create([
                'name' => $row['nama'],
                'email' => $row['email'],
                'username' => $row['username'] ?? explode('@', $row['email'])[0],
                'password' => bcrypt('password123'), // password default
                'avatar' => 'assets/img/avatar/avatar-1.png',
                'email_verified_at' => now(),
                // tambahkan kolom lainnya jika diperlukan
            ]);
            // Nonaktifkan logging untuk instance model ini
            $user->disableLogging();
            $user->save();

            $data = [
                'name' => $user->name,
                'email' => $user->email,
                'username' => $user->username,
                'password' => explode('@', $user->email)[0],
            ];
            // $statusMail = Mail::to($user->email)->send(new UserRegistrationMail($data));
            return $user;
        }
    }
}
