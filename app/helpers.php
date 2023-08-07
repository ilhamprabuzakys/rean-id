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
    $time = $updatedAt->format('l, d F Y - H:i:s');
    echo $time;
}

?>
