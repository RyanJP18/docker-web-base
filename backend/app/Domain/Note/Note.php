<?php

namespace App\Domain\Note;

use App\Utility\EventSourcing\Projection;
use Database\Factories\NoteFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Projection
{
    use HasFactory, SoftDeletes;

    protected $fillable = [];

    protected static function newFactory(): NoteFactory
    {
        return NoteFactory::new();
    }
}
