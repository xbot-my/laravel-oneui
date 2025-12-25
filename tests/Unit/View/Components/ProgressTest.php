<?php

use XBot\OneUI\View\Components\Progress;

test('progress component initializes with default values', function () {
    $progress = new Progress();

    expect($progress->value)->toBe(0)
        ->and($progress->color)->toBe('primary')
        ->and($progress->striped)->toBeFalse()
        ->and($progress->animated)->toBeFalse();
});

test('progress component handles custom value', function () {
    $progress = new Progress(value: 50);

    expect($progress->value)->toBe(50);
});

test('progress component handles custom color', function () {
    $progress = new Progress(color: 'success');

    expect($progress->color)->toBe('success');
});

test('progress component handles striped mode', function () {
    $progress = new Progress(striped: true);

    expect($progress->striped)->toBeTrue();
});

test('progress component handles animated mode', function () {
    $progress = new Progress(animated: true);

    expect($progress->animated)->toBeTrue();
});

test('progress component generates default progress bar classes', function () {
    $progress = new Progress();

    expect($progress->progressBarClasses())->toBe('progress-bar');
});

test('progress component generates colored progress bar classes', function () {
    $progress = new Progress(color: 'success');

    expect($progress->progressBarClasses())->toContain('bg-success');
});

test('progress component generates striped progress bar classes', function () {
    $progress = new Progress(striped: true);

    expect($progress->progressBarClasses())->toContain('progress-bar-striped');
});

test('progress component generates animated progress bar classes', function () {
    $progress = new Progress(animated: true);

    expect($progress->progressBarClasses())->toContain('progress-bar-animated');
});

test('progress component generates small progress classes', function () {
    $progress = new Progress(size: 'sm');

    expect($progress->progressClasses())->toContain('progress-sm');
});

test('progress component generates default progress classes', function () {
    $progress = new Progress();

    expect($progress->progressClasses())->toBe('progress');
});

test('progress component renders correct view', function () {
    $progress = new Progress();

    expect($progress->render()->name())->toBe('oneui::components.progress');
});
