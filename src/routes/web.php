<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactGroupController;
use App\Http\Controllers\Demo1Controller;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::get(
//    '/',
//    [HomeController::class, 'index']
//)->name('homepage');

Route::prefix('demo1')->group(function () {
    Route::get('/index', [Demo1Controller::class, 'index']);
});

Route::prefix('contact-group')->name('contactGroup')->group(function () {
    Route::get('/', [ContactGroupController::class, 'index'])->name('.list');
    Route::get('/add', [ContactGroupController::class, 'add'])->name('.add');
    Route::post('/create', [ContactGroupController::class, 'create'])->name('.create');
    Route::get('/show/{id}', [ContactGroupController::class, 'show'])->name('.show');
    Route::put('/update/{id}', [ContactGroupController::class, 'update'])->name('.update');
    Route::delete('/delete/{id}', [ContactGroupController::class, 'delete'])->name('.delete');
});

Route::prefix('contact')->name('contact')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('.list');
    Route::get('/add', [ContactController::class, 'add'])->name('.add');
    Route::post('/create', [ContactController::class, 'create'])->name('.create');
    Route::get('/show/{id}', [ContactController::class, 'show'])->name('.show');
    Route::put('/update/{id}', [ContactController::class, 'update'])->name('.update');
    Route::delete('/delete/{id}', [ContactController::class, 'delete'])->name('.delete');
});
