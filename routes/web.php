<?php

use App\Http\Controllers\Admin\ExerciseController as AdminExerciseController;
use App\Http\Controllers\Guest\ExerciseController as GuestExerciseController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PageController::class, "home"])->name("home");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ! GUEST
Route::prefix("/guest")->name("guest.")->group(function() {
    Route::get('/exercises', [GuestExerciseController::class, 'index'])->name('exercises.index');
    Route::post('/exercises', [GuestExerciseController::class, 'store'])->name('exercises.store');
    Route::get('/exercises/{id}', [GuestExerciseController::class, 'show'])->name('exercises.show');
});

// ! ADMIN
Route::middleware("auth")->prefix("/admin")->name("admin.")->group(function() {
    Route::get('/exercises', [AdminExerciseController::class, 'index'])->name('exercises.index');
    Route::post('/exercises', [AdminExerciseController::class, 'store'])->name('exercises.store');
    Route::get('/exercises/create', [AdminExerciseController::class, 'create'])->name('exercises.create');
    Route::get('/exercises/{id}', [AdminExerciseController::class, 'show'])->name('exercises.show');
    Route::put('/exercises/{id}', [AdminExerciseController::class, "update"])->name("exercises.update");
    Route::delete('/exercises/{id}', [AdminExerciseController::class, "destroy"])->name("exercises.delete");
    Route::get('/exercises/{id}/edit', [AdminExerciseController::class, "edit"])->name("exercises.edit");
});

