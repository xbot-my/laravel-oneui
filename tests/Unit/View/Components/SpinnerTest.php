<?php

use XBot\OneUI\View\Components\Spinner;

test('spinner component initializes with default values', function () {
    $spinner = new Spinner();

    expect($spinner->type)->toBe('border')
        ->and($spinner->color)->toBe('primary')
        ->and($spinner->size)->toBe('');
});

test('spinner component generates default classes', function () {
    $spinner = new Spinner();

    expect($spinner->spinnerClasses())->toBe('spinner-border text-primary');
});

test('spinner component handles grow type', function () {
    $spinner = new Spinner(type: 'grow');

    expect($spinner->spinnerClasses())->toContain('spinner-grow');
});

test('spinner component handles border type', function () {
    $spinner = new Spinner(type: 'border');

    expect($spinner->spinnerClasses())->toContain('spinner-border');
});

test('spinner component handles custom color', function () {
    $spinner = new Spinner(color: 'success');

    expect($spinner->spinnerClasses())->toContain('text-success');
});

test('spinner component handles small size', function () {
    $spinner = new Spinner(size: 'sm');

    expect($spinner->spinnerClasses())->toContain('spinner-border-sm');
});

test('spinner component handles grow type with small size', function () {
    $spinner = new Spinner(type: 'grow', size: 'sm');

    expect($spinner->spinnerClasses())->toContain('spinner-grow-sm');
});

test('spinner component renders correct view', function () {
    $spinner = new Spinner();

    expect($spinner->render()->name())->toBe('oneui::components.spinner');
});
