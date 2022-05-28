<?php

namespace App\Listeners;

use App\Events\SeriesCreated as SeriesCreatedEvent;
use App\Mail\SeriesCreated;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EmailUsersAboutSeriesCreated implements ShouldQueue
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
     * @param  SeriesCreatedEvent  $event
     * @return void
     */
    public function handle(SeriesCreatedEvent $event)
    {

        $usuarios = User::all();
        foreach($usuarios as $index => $usuario) {
            $email = new SeriesCreated(
                $event->seriesName,
                $event->seriesId,
                $event->seriesSeasonsQtty,
                $event->seriesEpisodesPerSeason,
            );

            $when = now()->addSeconds($index * 5);
            Mail::to($usuario)->later($when, $email);
        }
    }
}
