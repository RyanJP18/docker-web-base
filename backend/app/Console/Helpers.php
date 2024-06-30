<?php

namespace App\Console;

use App\Utility\EventSourcing\Command;
use Spatie\EventSourcing\Commands\CommandBus;

if (! function_exists('command')) {
    /**
     * Dispatch a command to the event-sourcing command bus.
     */
    function command(Command $command): void
    {
        $bus = app(CommandBus::class);
        $bus->dispatch($command);
    }
}
