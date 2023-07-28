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

Route::get('/dashboard', DashboardController::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/questions', [QuestionController::class, 'store'])->name('question.store');
Route::post('/questions/{question}/like', LikeController::class)->name('question.like');
Route::post('/questions/{question}/unlike', UnlikeController::class)->name('question.unlike');

Route::put('/questions/{question}/publish', PublishController::class)->name('question.publish');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
