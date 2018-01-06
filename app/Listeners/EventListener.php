<?php

namespace App\Listeners;

use App\Events\Event;
use Carbon\Carbon;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EventListener
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
     * @param  Event  $event
     * @return void
     */
    public function handle(Event $event)
    {
        $event->user->where('id',2)->update(['name' => str_random(10),'updated_at'=>Carbon::now()]);
        sleep(5);

    }
}
