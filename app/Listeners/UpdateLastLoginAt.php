<?php
namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Log;

class UpdateLastLoginAt
{
    /**
     * Handle the event.
     */
    public function handle(Login $event)
    {
        $user = $event->user;
        Log::info('User logged in: ' . $user->id);
        $user->last_login_at = now();
        $user->save();
        Log::info('Updated last_login_at for user: ' . $user->id);
    }
}
