<?php

namespace App\Domain\Note\Events;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class NoteUpdated extends ShouldBeStored
{
    public function __construct(
        public string $title,
        public string $content
    ) {}
}
