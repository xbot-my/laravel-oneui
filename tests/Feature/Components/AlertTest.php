<?php

use Illuminate\Support\Facades\Blade;

test('alert renders with correct type', function () {
    $html = Blade::render('<x-oneui::alert type="success">Success message</x-oneui::alert>');

    expect($html)->toContain('alert-success')
        ->toContain('Success message');
});

test('alert renders with dismissible option', function () {
    $html = Blade::render('<x-oneui::alert type="danger" :dismissible="true">Error</x-oneui::alert>');

    expect($html)->toContain('alert-dismissible')
        ->toContain('btn-close');
});
