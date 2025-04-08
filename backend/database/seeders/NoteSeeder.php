<?php

namespace Database\Seeders;

use Database\Factories\NoteFactory;
use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
{
    public function run()
    {
        NoteFactory::new()->create([
            'title' => 'Welcome', 
            'content' => 'See README.md for next steps',
        ]);

        NoteFactory::new()->count(3)->create();
    }
}
