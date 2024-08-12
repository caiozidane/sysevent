<?php

use App\Http\Controllers\SiteController;
use App\Http\Controllers\sys\EventsController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/eventos')->group(function () {
    Route::any('/search', [EventsController::class, 'search'])->name('events.search');
    Route::get('/create', [EventsController::class, 'create'])->name('events.create');
    Route::put('/{id}', [EventsController::class, 'update'])->name('events.update');
    Route::get('/edit/{id}', [EventsController::class, 'edit'])->name('events.edit');
    Route::delete('/{id}', [EventsController::class, 'destroy'])->name('events.destroy');
    Route::get('/{id}', [EventsController::class, 'show'])->name('events.show');
    Route::post('/', [EventsController::class, 'store'])->name('events.store');
    Route::get('/', [EventsController::class, 'index'])->name('events.index');
});

Route::get('/', [SiteController::class, 'index']);
Route::get('/eventos/{id}', [SiteController::class, 'show']);
