<?php

namespace App\Listeners;

use App\Models\User;
use App\Mail\logoutEmail;
use App\Mail\WelcomeMail;
use App\Events\UserLogout;
use App\Events\UserRegister;
use Illuminate\Events\Dispatcher;
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
     * Handle user login events.
     */
    public function handleUserRegister(UserRegister $event): void {
        Mail::to($event->user->email)->send(new WelcomeMail($event->user));
    }

    /**
     * Handle user logout events.
     */
    public function handleUserLogout(UserLogout $event): void {
        Mail::to($event->user->email)->send(new logoutEmail($event->user));
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @return array<string, string>
     */
    public function subscribe(Dispatcher $events): array
    {
        return [
            UserRegister::class => 'handleUserRegister',
            UserLogout::class => 'handleUserLogout',
        ];
    }

    /**
     * Handle the event.
     */
    // public function handle(UserRegister $event): void
    // {
    //     Mail::to($event->user->email)->send(new WelcomeMail($event->user));

    // }
}
