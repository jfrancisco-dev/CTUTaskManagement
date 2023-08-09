<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TasklistController;
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
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/tasklist', [TasklistController::class, 'index'])->name('tasklist.index');

    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get("/user/create",[UserController::class, 'create'])->name('user.create');
    Route::get('/user/{user}', [UserController::class, 'show'])->name('user.view');
    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::get('/user/{user}/delete', [UserController::class, 'destroy'])->name('user.delete');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
});