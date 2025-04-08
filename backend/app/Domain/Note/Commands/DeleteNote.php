<?php

namespace App\Domain\Note\Commands;

use App\Domain\Note\NoteAggregate;
use App\Utility\EventSourcing\Command;
use Exception;
use Spatie\EventSourcing\Commands\AggregateUuid;
use Spatie\EventSourcing\Commands\HandledBy;

#[HandledBy(NoteAggregate::class)]
class DeleteNote implements Command
{
    /**
     * @throws Exception
     */
    public function __construct(
        #[AggregateUuid] public string $id
    ) {}
}
