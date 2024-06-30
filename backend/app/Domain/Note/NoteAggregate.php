<?php

namespace App\Domain\Note;

use App\Domain\Note\Commands\CreateNote;
use App\Domain\Note\Commands\DeleteNote;
use App\Domain\Note\Commands\UpdateNote;
use App\Domain\Note\Events\NoteCreated;
use App\Domain\Note\Events\NoteDeleted;
use App\Domain\Note\Events\NoteUpdated;
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

    protected function update(UpdateNote $command): static
    {
        $this->recordThat(new NoteUpdated(
            title: $command->title,
            content: $command->content,
        ));

        return $this;
    }

    protected function delete(DeleteNote $command): static
    {
        $this->recordThat(new NoteDeleted());

        return $this;
    }
}
