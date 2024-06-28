<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Target;

class TargetController extends Controller
{
    public function index() 
    {
        return response()->json(Target::all());
    }

    public function search_mirna(string $mirna_id)
    {
        return response()->json(Target::where('mirna_id', $mirna_id)->orderByDesc('score')->get());
    }

    public function search_transcript(string $transcript_id)
    {
        return response()->json(Target::where('ensembl_transcript_id', $transcript_id)->orderByDesc('score')->get());
    }
}