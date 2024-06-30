<?php

namespace App\Domain\Note;

use App\Domain\Note\Commands\CreateNote;
use App\Domain\Note\Events\NoteCreated;
use Spatie\EventSourcing\AggregateRoots\AggregateRoot;

class NoteAggregate extends AggregateRoot
{
    protected function create(CreateNote $command): static
    {
        $this->recordThat(new NoteCreated(
            title: $command->title,
            content: $command->content,
        ));

        return $this;
    }
}
