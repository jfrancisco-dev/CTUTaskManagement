<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TasklistController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

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

Auth::routes();

Route::middleware(['auth'])->group(function() {
    //routes for home
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    //routes for users
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get("/user/create",[UserController::class, 'create'])->name('user.create');
    Route::get('/user/{user}', [UserController::class, 'show'])->name('user.view');
    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::get('/user/{user}/delete', [UserController::class, 'destroy'])->name('user.delete');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');

    //routes for tasklist
    Route::get('/tasklist', [TasklistController::class, 'index'])->name('tasklist.index');
    Route::get("/tasklist/create",[TasklistController::class, 'create'])->name('tasklist.create');
    Route::post('/tasklist/store', [TasklistController::class, 'store'])->name('tasklist.store');
    Route::get('/tasklist/{tasklist}', [TasklistController::class, 'show'])->name('tasklist.view');
    Route::get('/tasklist/{tasklist}/edit', [TasklistController::class, 'edit'])->name('tasklist.edit');
    Route::get('/tasklist/{tasklist}/delete', [TasklistController::class, 'destroy'])->name('tasklist.delete');
    Route::put('/tasklist/{tasklist}', [TasklistController::class, 'update'])->name('tasklist.update');

    //routes for taskl
    Route::get('/task', [TaskController::class, 'index'])->name('task.index');
    Route::get("/task/create",[TaskController::class, 'create'])->name('task.create');
    Route::post('/task/store', [TaskController::class, 'store'])->name('task.store');
    Route::get('/task/{task}', [TaskController::class, 'show'])->name('task.view');
    Route::get('/task/{task}/edit', [TaskController::class, 'edit'])->name('task.edit');
    Route::get('/task/{task}/delete', [TaskController::class, 'destroy'])->name('task.delete');
    Route::put('/task/{task}', [TaskController::class, 'update'])->name('task.update');
});