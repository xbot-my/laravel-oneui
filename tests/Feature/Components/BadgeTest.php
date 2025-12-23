<?php

use Illuminate\Support\Facades\Blade;

test('badge renders with correct classes', function () {
    $html = Blade::render('<x-oneui::badge type="success">Active</x-oneui::badge>');

    expect($html)->toContain('bg-success-light')
        ->toContain('text-success')
        ->toContain('Active');
});

test('badge renders as pill', function () {
    $html = Blade::render('<x-oneui::badge type="primary" :pill="true">Label</x-oneui::badge>');

    expect($html)->toContain('rounded-pill');
});
