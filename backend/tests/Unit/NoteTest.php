<?php

use App\Domain\Note\Note;
use App\Http\Controllers\NoteController;

beforeEach(function () {
    $this->note = Note::factory()->create();
});


it('has a get api route', function () {
    $response = $this->getJson('/api/notes')->assertOk();

    expect(count($response->json()))->toEqual(Note::count());
});

it('has a store api route', function () {
    $response = $this->postJson(action([NoteController::class, 'store']), [
        'title' => $this->note->title,
        'content' => $this->note->content,
    ]);

    $response->assertSuccessful();
});

it('has an update api route', function () {
    $updatedFields = [
        'title' => 'new title', 
        'content' => 'new content'
    ];


    $response = $this->patchJson(action([NoteController::class, 'update'], $this->note->id), $updatedFields);

    $response->assertSuccessful();
});


it('has a delete api route', function () {
    $response = $this->deleteJson(action([NoteController::class, 'update'], $this->note->id));

    $response->assertSuccessful();
});

