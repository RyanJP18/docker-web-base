<?php

namespace App\Http\Controllers;

use App\Domain\Note\Commands\CreateNote;
use App\Domain\Note\Commands\DeleteNote;
use App\Domain\Note\Commands\UpdateNote;
use App\Domain\Note\Note;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

use function App\Console\command;

class NoteController extends Controller
{
    public function index()
    {
        return response()->json(Note::all());
    }

    public function store(Note $request): JsonResponse
    {
        try {
            $validatedData = request()->validate([
                'title' => 'required|string',
                'content' => 'string',
            ]);

            $ulid = Str::ulid();

            command(new CreateNote(
                $ulid,
                $validatedData['title'],
                $validatedData['content']
            ));

            $note = Note::find($ulid);

            return response()->json($note);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to store note'], 500);
        }
    }

    public function update(Note $note, Request $request): JsonResponse
    {
        try {
            $validatedData = request()->validate([
                'title' => 'required|string',
                'content' => 'string',
            ]);

            command(new UpdateNote(
                $note->id,
                $validatedData['title'],
                $validatedData['content']
            ));

            $note = Note::find($note->id);

            return response()->json($note);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to update note'], 500);
        }
    }

    public function destroy(Note $note): JsonResponse
    {
        try {
            command(new DeleteNote(
                $note->id
            ));

            return response()->json(status: 204);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to update note'], 500);
        }
    }
}
