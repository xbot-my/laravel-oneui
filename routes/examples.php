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

Route::prefix('oneui')->group(function () {
    Route::get('/buttons', fn() => view('oneui.buttons'))->name('oneui.buttons');
    Route::get('/alerts', fn() => view('oneui.alerts'))->name('oneui.alerts');
    Route::get('/forms', fn() => view('oneui.forms'))->name('oneui.forms');
    Route::get('/modals', fn() => view('oneui.modals'))->name('oneui.modals');
    Route::get('/tables', fn() => view('oneui.tables'))->name('oneui.tables');
    Route::get('/navigation', fn() => view('oneui.navigation'))->name('oneui.navigation');
    Route::get('/feedback', fn() => view('oneui.feedback'))->name('oneui.feedback');
    Route::get('/layout', fn() => view('oneui.layout'))->name('oneui.layout');
    Route::get('/stats', fn() => view('oneui.stats'))->name('oneui.stats');
});
