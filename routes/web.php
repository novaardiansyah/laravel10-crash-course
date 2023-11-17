<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// * Route Group
Route::group([
  'prefix'     => 'idea',
  'as'         => 'idea.',
  'middleware' => ['auth']
], function() {
  Route::post('/', [IdeaController::class, 'store'])->name('create');
  Route::get('/{idea}', [IdeaController::class, 'show'])->name('show');

  Route::group(['middleware' => ['auth']], function() {
    Route::get('/{idea}/edit', [IdeaController::class, 'edit'])->name('edit');
    Route::put('/{idea}', [IdeaController::class, 'update'])->name('update');
    Route::delete('/{idea}', [IdeaController::class, 'destroy'])->name('destroy');
  });
});

Route::post('/ideas/{idea}/comments', [CommentController::class, 'store'])->name('ideas.comment.store');

Route::get('/terms', function() {
  return view('terms');
});