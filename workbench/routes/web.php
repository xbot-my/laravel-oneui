<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('test/components')->group(function () {
    Route::view('button', 'tests::test.pages.components.button');
    Route::view('input', 'tests::test.pages.components.input');
});


require base_path('routes/examples.php');
