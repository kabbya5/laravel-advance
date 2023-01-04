<?php

namespace App\Listeners;

use App\Events\UserProcessedEvent;
use App\Mail\UserCreateNotification;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class SendCreateUserNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserProcessedEvent  $event
     * @return void
     */
    public function handle(UserProcessedEvent $event)
    {
        $users = User::all();

        foreach($users as $user){
            Mail::to($user->email)->send(new UserCreateNotification($event->last_user));
        }
    }
}
