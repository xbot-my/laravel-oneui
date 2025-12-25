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

Route::get('/', fn() => view('oneui::examples.index'))->name('index');
Route::get('/layout', fn() => view('oneui::examples.layout'))->name('layout');
Route::get('/forms', fn() => view('oneui::examples.forms'))->name('forms');
Route::get('/forms-advanced', fn() => view('oneui::examples.forms-advanced'))->name('forms-advanced');
Route::get('/tables', fn() => view('oneui::examples.tables'))->name('tables');
Route::get('/charts', fn() => view('oneui::examples.charts'))->name('charts');
Route::get('/metrics', fn() => view('oneui::examples.metrics'))->name('metrics');
Route::get('/lists', fn() => view('oneui::examples.lists'))->name('lists');
Route::get('/cards', fn() => view('oneui::examples.cards'))->name('cards');
Route::get('/calendar', fn() => view('oneui::examples.calendar'))->name('calendar');
Route::get('/editors', fn() => view('oneui::examples.editors'))->name('editors');
Route::get('/upload', fn() => view('oneui::examples.upload'))->name('upload');
Route::get('/navigation', fn() => view('oneui::examples.navigation'))->name('navigation');
Route::get('/notifications', fn() => view('oneui::examples.notifications'))->name('notifications');
Route::get('/media', fn() => view('oneui::examples.media'))->name('media');
Route::get('/utilities', fn() => view('oneui::examples.utilities'))->name('utilities');
Route::get('/alerts', fn() => view('oneui::examples.alerts'))->name('alerts');
Route::get('/modals', fn() => view('oneui::examples.modals'))->name('modals');
