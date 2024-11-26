<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;


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

Route::get('/dashboard',[CategoryController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(callback: function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(TaskController::class)->group(function () {
    Route::get('/tasks/create', 'create');
    Route::post('/logout', 'logout');
    Route::post('/tasks/store', 'store');
    Route::get('/tasks/index/{id}', 'index');
    Route::patch('/tasks/{id}', 'update');
    Route::delete('/tasks/{id}', 'delete');
    
});

Route::get('/tasks/category',[CategoryController::class,'index']);


require __DIR__.'/auth.php';
