<?php

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
    $errors = $e->validator->errors()->toArray();
    $errorString = '<br>';
    foreach ($errors as $field => $errorList) {
        foreach ($errorList as $error) {
            $errorString .= "<span class='text-danger'>" . $error . "</span><br>";
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
