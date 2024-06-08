<?php

use App\Events\TypingEvent;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

Broadcast::channel('chat', function ($user) {
    // return Auth::check();
    return true;
});
$user = Auth::user();

Broadcast::channel('typingchat', function ($user) {
    return true;
});

event(new TypingEvent($user));

// Broadcast::channel('chat.{messageId}', function (User $user, int $messageId) {
//     return $user->id === Message::findOrNew($messageId)->user_id;
// });