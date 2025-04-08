<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

trait SupportsProjections
{
    public function newModel(array $attributes = []): object
    {
        return Factory::newModel([
            'id' => Str::ulid(),
            ...$attributes,
        ])->writeable();
    }
}
