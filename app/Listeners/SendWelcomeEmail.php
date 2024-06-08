<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class SendWelcomeEmail
{
    public function handle(UserRegistered $event)
    {
        $user = $event->user;
        $token = Str::random(40);
        // $user->registration_token = $token;
        // $user->save();
        // Send a welcome email to the registered user
        Mail::send('emails.welcome', ['user' => $user, 'token' => $token], function ($message) use ($user) {
            $message->to($user->email)
                ->subject('Welcome to Our Application');
        });
    }
}