<?php

use Illuminate\Support\Facades\Blade;

test('button renders with correct classes', function () {
    $html = Blade::render('<x-oneui::button type="primary">Click Me</x-oneui::button>');

    expect($html)->toContain('btn')
        ->toContain('btn-primary')
        ->toContain('Click Me');
});

test('button renders with outline style', function () {
    $html = Blade::render('<x-oneui::button type="success" :outline="true">Click</x-oneui::button>');

    expect($html)->toContain('btn-outline-success');
});

test('button renders with size', function () {
    $html = Blade::render('<x-oneui::button type="primary" size="lg">Click</x-oneui::button>');

    expect($html)->toContain('btn-lg');
});
