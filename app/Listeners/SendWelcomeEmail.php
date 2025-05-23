<?php

namespace App\Listeners;

use App\Models\User;
use App\Mail\WelcomeMail;
use App\Events\UserRegister;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendWelcomeEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     */
    public function handle(UserRegister $event): void
    {
        Mail::to($event->user->email)->send(new WelcomeMail($event->user));

    }
}
