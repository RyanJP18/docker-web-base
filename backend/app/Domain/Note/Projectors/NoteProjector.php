<?php

namespace App\Domain\Note\Projectors;

use App\Domain\Note\Events\NoteCreated;
use App\Domain\Note\Events\NoteDeleted;
use App\Domain\Note\Events\NoteUpdated;
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

    public function onNoteUpdated(NoteUpdated $event): void
    {
        $note = Note::find($event->aggregateRootUuid());

        $note->writeable()->update([
            'title' => $event->title,
            'content' => $event->content
        ]);
    }

    public function onNoteDeleted(NoteDeleted $event): void
    {
        $note = Note::find($event->aggregateRootUuid());

        $note->writeable()->delete();
    }
}
