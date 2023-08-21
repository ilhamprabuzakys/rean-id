<?php

use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('chat.{receiver}', function (User $user, $receiver) {
    # Check if user is same as receiver
    // dd($user->id);
    \Illuminate\Support\Facades\Log::info('Authenticated User ID:', [$user->id]);
    \Illuminate\Support\Facades\Log::info('Receiver ID:', [$receiver]);
    \Illuminate\Support\Facades\Log::info((int) $user->id === (int) $receiver);
    return (int) $user->id === (int) $receiver;
});
