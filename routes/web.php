<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ForumController;

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

Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');
Route::get('/forum/create', [ForumController::class, 'create'])->name('forum.create');
Route::post('/forum/store', [ForumController::class, 'store'])->name('forum.store');

Route::get('/forum/{id}', [ForumController::class, 'show'])->name('forum.show');
Route::get('/forum/{id}/edit', [ForumController::class, 'edit'])->name('forum.edit');
Route::put('/forum/{id}', [ForumController::class, 'update'])->name('forum.update');

Route::delete('forum/{id}', [ForumController::class, 'destroy'])->name('forum.destroy');

Route::get('/', function () {
    return view('welcome');
});
