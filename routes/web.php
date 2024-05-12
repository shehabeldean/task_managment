<?php

use App\Http\Controllers\StatisticController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/search-admins', [UserController::class, 'searchAdmins']);
Route::get('/search-users', [UserController::class, 'searchUsers']);


Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');


Route::get('/statistics' , [StatisticController::class , 'index'])->name('statistic.index');

