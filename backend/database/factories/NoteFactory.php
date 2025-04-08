<?php

namespace Database\Factories;

use App\Domain\Note\Note;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class NoteFactory extends Factory
{
    use SupportsProjections;

    protected $model = Note::class;

    public function definition(): array
    {
        return [
            'title' => 'title',
            'content' => 'content',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
