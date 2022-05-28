<?php

namespace App\Listeners;

use App\Events\SeriesDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SeriesDeletedListener
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
     * @param  \App\Events\SeriesDeleted  $event
     * @return void
     */
    public function handle(SeriesDeleted $event)
    {
        //
    }
}
