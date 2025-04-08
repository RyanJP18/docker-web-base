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
            'title' => $this->faker->word(),
            'content' => implode(' ', $this->faker->words(mt_rand(5, 10))),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
