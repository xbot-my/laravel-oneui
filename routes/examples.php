<?php

use Illuminate\Support\Facades\Route;
use XBot\OneUI\Http\Controllers\Examples;

/*
|--------------------------------------------------------------------------
| OneUI Example Routes
|--------------------------------------------------------------------------
|
| These routes are published by the oneui:examples command.
| You can modify them as needed.
|
*/

Route::get('/', Examples\IndexController::class)->name('index');
Route::get('/layout', Examples\LayoutController::class)->name('layout');
Route::get('/forms', Examples\FormController::class)->name('forms');
Route::get('/forms-advanced', Examples\FormAdvancedController::class)->name('forms-advanced');
Route::get('/tables', Examples\TableController::class)->name('tables');
Route::get('/charts', Examples\ChartController::class)->name('charts');
Route::get('/metrics', Examples\MetricController::class)->name('metrics');
Route::get('/lists', Examples\ListController::class)->name('lists');
Route::get('/cards', Examples\CardController::class)->name('cards');
Route::get('/calendar', Examples\CalendarController::class)->name('calendar');
Route::get('/editors', Examples\EditorController::class)->name('editors');
Route::get('/upload', Examples\UploadController::class)->name('upload');
Route::get('/navigation', Examples\NavigationController::class)->name('navigation');
Route::get('/notifications', Examples\NotificationController::class)->name('notifications');
Route::get('/media', Examples\MediaController::class)->name('media');
Route::get('/utilities', Examples\UtilityController::class)->name('utilities');
Route::get('/alerts', Examples\AlertController::class)->name('alerts');
Route::get('/modals', Examples\ModalController::class)->name('modals');
