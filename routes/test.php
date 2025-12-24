<?php

use Illuminate\Support\Facades\Route;

Route::prefix('test/components')->group(function () {
    $componentPages = [
        'button', 'input', 'textarea', 'select', 'checkbox', 'radio',
        'file-input', 'floating-label', 'input-group', 'select2',
        'datepicker', 'switch', 'range', 'dropzone', 'ckeditor5',
        'badge', 'card', 'pagination', 'stat-widget', 'data-list',
        'alert', 'toast', 'spinner', 'progress', 'loading',
        'rating', 'sweetalert2',
        'breadcrumb', 'nav-tabs', 'tabs',
        'accordion', 'modal', 'dropdown', 'tooltip', 'popover',
        'offcanvas', 'megamenu',
        'chartjs', 'datatables', 'fullcalendar',
    ];

    foreach ($componentPages as $name) {
        Route::view("test/components/{$name}", "tests::test.pages.components.{$name}");
    }
});

Route::prefix('test/flows')->group(function () {
    Route::view('registration', 'tests::test.flows.registration');
    Route::view('form-validation', 'tests::test.flows.form-validation');
    Route::view('data-table', 'tests::test.flows.data-table');
});
