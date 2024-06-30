<?php

namespace App\Domain\Note\Projectors;

use App\Domain\Note\Events\NoteCreated;
use App\Domain\Note\Note;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class NoteProjector extends Projector
{
    public function onNoteCreated(NoteCreated $event): void
    {
        (new Note())->writeable()->create([
            'id' => $event->aggregateRootUuid(),
            'title' => $event->title,
            'content' => $event->content,
            'created_at' => $event->createdAt(),
            'updated_at' => $event->createdAt(),
        ]);
    }
}
