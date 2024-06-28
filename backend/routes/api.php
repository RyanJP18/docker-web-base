<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TargetController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('targets')->controller(TargetController::class)->group(function() {
    Route::get('', 'index');
    Route::get('/search_mirna/{mirna_id}', 'search_mirna');
    Route::get('/search_transcript/{transcript_id}', 'search_transcript');
});