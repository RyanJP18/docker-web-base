<?php

namespace App\Domain\Note\Events;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class NoteDeleted extends ShouldBeStored
{
    public function __construct(
    ) {}
}
