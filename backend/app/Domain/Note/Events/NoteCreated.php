<?php

namespace App\Domain\Note\Events;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

final class NoteCreated extends ShouldBeStored
{
    public function __construct(
        public string $title,
        public string $content,
    ) {
    }
}
