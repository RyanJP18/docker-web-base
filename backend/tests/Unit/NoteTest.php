<?php

use App\Domain\Note\Note;
use App\Http\Controllers\NoteController;

use function Pest\Laravel\postJson;

beforeEach(function () {
    $this->note = Note::factory()->create();
});

it('has a store api route', function () {
    // setupUserWithAllPermissions();

    // Mail::fake();

    $response = postJson(action([NoteController::class, 'store']), [
        // 'id' => $this->note->id,
        'title' => $this->note->title,
        'content' => $this->note->content,
    ]);

    $response->assertSuccessful();
});
