<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::post('/register', [JWTController::class, 'register']);

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // return view('dashboard');
    Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');
    Route::get('/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
    Route::post('/edit/{id}', [PostController::class, 'update'])->name('post.update');
    Route::get('/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/create', [PostController::class, 'store'])->name('post.store');
});
