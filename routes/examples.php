<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| OneUI Example Routes
|--------------------------------------------------------------------------
|
| These routes are published by the oneui:examples command.
| You can modify them as needed.
|
*/

Route::prefix('examples')->name('examples.')->group(function () {
    // Index - Component directory
    Route::get('/', fn() => view('examples.index'))->name('index');

    // Layout components
    Route::get('/layout', fn() => view('examples.layout'))->name('layout');

    // Form components
    Route::get('/forms', fn() => view('examples.forms'))->name('forms');

    // Data display
    Route::get('/tables', fn() => view('examples.tables'))->name('tables');
    Route::get('/charts', fn() => view('examples.charts'))->name('charts');
    Route::get('/metrics', fn() => view('examples.metrics'))->name('metrics');
    Route::get('/lists', fn() => view('examples.lists'))->name('lists');
    Route::get('/cards', fn() => view('examples.cards'))->name('cards');

    // Specialized components
    Route::get('/calendar', fn() => view('examples.calendar'))->name('calendar');
    Route::get('/editors', fn() => view('examples.editors'))->name('editors');
    Route::get('/upload', fn() => view('examples.upload'))->name('upload');

    // Navigation
    Route::get('/navigation', fn() => view('examples.navigation'))->name('navigation');

    // Feedback & notifications
    Route::get('/notifications', fn() => view('examples.notifications'))->name('notifications');

    // Media
    Route::get('/media', fn() => view('examples.media'))->name('media');

    // Utilities
    Route::get('/utilities', fn() => view('examples.utilities'))->name('utilities');
});

// Legacy routes (keep for backward compatibility)
Route::prefix('oneui')->group(function () {
    Route::get('/buttons', fn() => view('examples.forms'))->name('oneui.buttons');
    Route::get('/alerts', fn() => view('examples.notifications'))->name('oneui.alerts');
    Route::get('/forms', fn() => view('examples.forms'))->name('oneui.forms');
    Route::get('/modals', fn() => view('examples.notifications'))->name('oneui.modals');
    Route::get('/tables', fn() => view('examples.tables'))->name('oneui.tables');
    Route::get('/navigation', fn() => view('examples.navigation'))->name('oneui.navigation');
    Route::get('/feedback', fn() => view('examples.notifications'))->name('oneui.feedback');
    Route::get('/layout', fn() => view('examples.layout'))->name('oneui.layout');
    Route::get('/stats', fn() => view('examples.metrics'))->name('oneui.stats');
});
