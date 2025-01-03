<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [TaskController::class, 'index'])->name('home');

// Task management
Route::resource('tasks', TaskController::class);