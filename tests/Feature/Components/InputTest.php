<?php

use Illuminate\Support\Facades\Blade;

test('input renders with correct attributes', function () {
    $html = Blade::render('<x-oneui::input name="email" label="Email" type="email" />');

    expect($html)->toContain('name="email"')
        ->toContain('type="email"')
        ->toContain('Email');
});

test('input renders with value', function () {
    $html = Blade::render('<x-oneui::input name="username" value="john_doe" />');

    expect($html)->toContain('value="john_doe"');
});

test('input renders with error state', function () {
    $html = Blade::render('<x-oneui::input name="email" error="Invalid email" />');

    expect($html)->toContain('is-invalid')
        ->toContain('Invalid email');
});
