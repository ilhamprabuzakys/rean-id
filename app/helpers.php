<?php

use App\Models\LoginInfo;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Jenssegers\Agent\Agent;
use Stevebauman\Location\Facades\Location;

function generateOTP()
{
    $otpLength = 6;
    $otp = '';

    for ($i = 0; $i < $otpLength; $i++) {
        $otp .= random_int(0, 9);
    }

    return $otp;
}

function echoTime($var_time)
{
    $time = '';
    $currentTime = now();
    $updatedAt = $var_time;

    $diffInSeconds = $currentTime->diffInSeconds($updatedAt);
    // if ($diffInSeconds < 60) {
    //     $time = 'Baru saja - ' . $diffInSeconds + 4 . ' detik yang lalu';
    // } else {
    //     $time = $updatedAt->format('l, d F Y - H:i:s');
    // }
    $time = $updatedAt->format('d F Y');
    echo $time;
}

function getErrorsString($e)
{
    // Jika $e adalah instansi dari ValidationException, kita akan mengambil validator errors dari dalamnya
    if ($e instanceof Illuminate\Validation\ValidationException) {
        $errors = $e->validator->errors()->toArray();
    }
    // Jika $e adalah instansi dari MessageBag (hasil dari getErrorBag()), kita akan mengubahnya menjadi array
    elseif ($e instanceof Illuminate\Support\MessageBag) {
        $errors = $e->toArray();
    }
    // Jika $e adalah array, kita langsung menggunakannya sebagai $errors
    elseif (is_array($e)) {
        $errors = $e;
    }
    // Jika tidak memenuhi kedua kondisi di atas, kita bisa mengatur default atau mengembalikan pesan error
    else {
        return 'Terjadi kesalahan yang tidak dikenal.';
    }
    $errorString = '<br><br>';
    foreach ($errors as $field => $errorList) {
        foreach ($errorList as $error) {
            $errorString .= "<span class='text-danger text-start'>" . $error . "</span><br>";
        }
    }
    return $errorString;
}

function echoLogSubject($e)
{
    $var = class_basename($e);
    if ($var == 'Post') {
        $var = 'Postingan';
    } elseif ($var == 'Category') {
        $var = 'Kategori';
    } elseif ($var == 'Tag') {
        $var = 'Label';
    }
    echo $var;
}

function echoLogEvent($e)
{
    $var = $e;
    if ($var == 'created') {
        $var = 'Penambahan';
    } elseif ($var == 'updated') {
        $var = 'Pembaharuan';
    } elseif ($var == 'deleted') {
        $var = 'Penghapusan';
    }
    echo $var;
}

function getPublicIP()
{
    // Logic untuk mendapatkan IP public.
    $response = Http::get('http://ipecho.net/plain');
    return $response->body();
}

function saveUserLogoutInfo()
{
    User::find(auth()->user()->id)->update([
        'status' => 'offline',
        'last_activity_at' => now(),
    ]);
}

function saveUserLoginInfo()
{
    $ip = \getPublicIP();
    // $ip = request()->ip();
    $location = Location::get($ip);
    $agent = new Agent();
    $device = $agent->isDesktop() ? 'Desktop' : ($agent->isMobile() ? 'Mobile' : 'WebKit');

    User::find(auth()->user()->id)->update([
        'status' => 'online',
        'last_login_at' => now(),
        'last_login_ip' => $ip
    ]);

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

function formatTanggalIndonesia($tanggal) {
    $hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
    $bulan = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    $namaHari = $hari[date('w', strtotime($tanggal))];
    $namaBulan = $bulan[date('n', strtotime($tanggal))];

    return $namaHari . ", " . date('d', strtotime($tanggal)) . " " . $namaBulan . " " . date('Y', strtotime($tanggal));
}