<?php

namespace App\Listeners;

use Spatie\Permission\Models\Role;
use App\Events\LeaveRequestCreated;
use App\Notifications\LeaveRequestNotification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendLeaveRequestNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(LeaveRequestCreated $event): void
    {
        $directorRole = Role::where('name', 'director')->first();
        $directors = $directorRole->users;
        foreach ($directors as $director) {
            $director->notify(new LeaveRequestNotification($event->leaveRequest));
        }
    }
}
