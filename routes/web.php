<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\SubtaskController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::patch('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
    Route::put('/tasks/{task}', [TaskController::class, 'status'])->name('tasks.status');


});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/tasks/subtasks', [SubtaskController::class, 'index'])->name('subtasks.index');
    Route::get('/tasks/{task}/subtasks/create', [SubtaskController::class, 'create'])->name('subtasks.create');
    Route::post('/tasks/{task}/subtasks', [SubtaskController::class, 'store'])->name('subtasks.store');
    Route::get('/tasks/{task}/subtasks/{subtask}/edit', [SubtaskController::class, 'edit'])->name('subtasks.edit');
    Route::patch('/tasks/{task}/subtasks/{subtask}', [SubtaskController::class, 'update'])->name('subtasks.update');
    Route::delete('/tasks/{task}/subtasks/{subtask}', [SubtaskController::class, 'destroy'])->name('subtasks.destroy');
    Route::put('/tasks/{task}/subtasks/{subtask}', [SubtaskController::class, 'status'])->name('subtasks.status');


});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
