<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\DisciplineController;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NiveauxController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\UserController;
use App\Models\Discipline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::middleware('auth:sanctum')->group(function (){
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
     Route::get('/logout', [UserController::class, 'logout']);

});
Route::post('/login', [UserController::class, 'login']);



Route::get("/niveaux",[NiveauxController::class,'index']);
Route::get("niveaux/{niveau}",[NiveauxController::class,'find'])->where('id', '[0-9]+');


Route::apiResource('eleves',EleveController::class)->only(['store']);
Route::get("/eleves",[EleveController::class,'index']);
Route::put("/eleves/sortie",[EleveController::class, 'updateState']);
Route::get("/eleves/{id}/participations",[EleveController::class, 'getParticipations']);


Route::get("/classes",[ClassesController::class,'index']);
Route::get("/classes/{id}/eleves",[ClassesController::class, 'eleve']);
Route::get("/classes/{id}/coef",[ClassesController::class, 'coef']);
Route::get("/classes/{classe}/notes",[ClassesController::class, 'getNotes']);
Route::get("/classes/{classe}/notes/eleves/{eleve}",[ClassesController::class, 'getNoteByEleve']);
Route::get("/classes/{classe}/disciplines/{discipline}/evaluations/{evaluation}/eleves/{eleve}/notes",[ClassesController::class, 'getNotesByDiscipline']);
Route::get("/classes/{classe}/disciplines/{discipline}/notes",[ClassesController::class, 'getNoteByDiscipline']);
Route::post("/classes/{classe}/coef",[ClassesController::class, 'storeCoef']);
Route::post('/classes/{classe}/disciplines/{discipline}/evaluations/{evaluation}',[NoteController::class, 'insertNote']);
Route::put('/classes/{classe}/disciplines/{discipline}/evaluations/{evaluation}/eleves/{eleve}',[NoteController::class, 'updateNote']);


Route::apiResource('disciplines', DisciplineController::class);
Route::apiResource('evaluations', EvaluationController::class);


Route::post('/login', [UserController::class, 'login']);
Route::post("/users",[UserController::class, 'store']);
Route::get("/users",[UserController::class, 'index']);
Route::get("/users/{id}",[UserController::class, 'show']);
Route::put("/users/{id}",[UserController::class, 'update']);
Route::delete("/users/{id}",[UserController::class, 'delete']);
Route::get("/users/{id}/evenement",[UserController::class, 'getEvenementByUser']);
Route::get("/classes/{id}/participations",[ClassesController::class, 'getParticipationsByUser']);


Route::post('/events',[EventController::class, 'store']);
Route::get('/events',[EventController::class, 'index']);
Route::post('/events/{event}/participations',[EventController::class, 'addParticipants']);





