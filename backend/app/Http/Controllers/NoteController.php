<?php

namespace App\Http\Controllers;

use App\Domain\Note\Commands\CreateNote;
use App\Domain\Note\Note;
use Illuminate\Http\JsonResponse;
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
                'content' => 'string'
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
}