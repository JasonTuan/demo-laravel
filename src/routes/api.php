<?php

use App\Http\Controllers\API\ContactGroupController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('contact-groups')->name('api.contactGroup')->group(function () {
    Route::get('/', [ContactGroupController::class, 'index'])->name('.list');
    Route::post('/', [ContactGroupController::class, 'create'])->name('.create');
    Route::get('/{id}', [ContactGroupController::class, 'show'])->name('.show');
    Route::put('/{id}', [ContactGroupController::class, 'update'])->name('.update');
    Route::delete('/{id}', [ContactGroupController::class, 'delete'])->name('.delete');
});
