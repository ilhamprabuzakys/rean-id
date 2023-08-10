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
    $time = $updatedAt->format('l, d F Y - H:i:s');
    echo $time;
}

?>
