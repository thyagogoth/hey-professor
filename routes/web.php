<?php

use App\Http\Controllers\{
    DashboardController,
    LikeController,
    ProfileController,
    PublishController,
    QuestionController,
    UnlikeController
};

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
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    #region Questions Routes
    Route::get('/questions', [QuestionController::class, 'index'])->name('question.index');
    Route::post('/questions/store', [QuestionController::class, 'store'])->name('question.store');
    Route::get('/questions/{question}/edit', [QuestionController::class, 'edit'])->name('question.edit');
    Route::put('/questions/{question}/update', [QuestionController::class, 'update'])->name('question.update');
    Route::patch('/questions/{question}/archive', [QuestionController::class, 'archive'])->name('question.archive');
    Route::patch('/questions/{question}/restore', [QuestionController::class, 'restore'])->name('question.restore');
    Route::delete('/questions/{question}/destroy', [QuestionController::class, 'destroy'])->name('question.destroy');
    Route::put('/questions/{question}/publish', PublishController::class)->name('question.publish');

    Route::post('/questions/{question}/like', LikeController::class)->name('question.like');
    Route::post('/questions/{question}/unlike', UnlikeController::class)->name('question.unlike');

    #region Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
