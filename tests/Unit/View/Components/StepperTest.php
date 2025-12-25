<?php

use XBot\OneUI\View\Components\Stepper;

test('stepper component initializes with default values', function () {
    $stepper = new Stepper();

    expect($stepper->steps)->toBeEmpty()
        ->and($stepper->current)->toBe(0)
        ->and($stepper->vertical)->toBeFalse();
});

test('stepper component handles steps array', function () {
    $steps = [
        ['title' => 'Step 1'],
        ['title' => 'Step 2'],
    ];
    $stepper = new Stepper(steps: $steps);

    expect($stepper->steps)->toBe($steps);
});

test('stepper component handles current step', function () {
    $stepper = new Stepper(current: 2);

    expect($stepper->current)->toBe(2);
});

test('stepper component handles vertical mode', function () {
    $stepper = new Stepper(vertical: true);

    expect($stepper->vertical)->toBeTrue();
});

test('stepper component generates default classes', function () {
    $stepper = new Stepper();

    expect($stepper->stepperClasses())->toBe('nav nav-pills nav-justified');
});

test('stepper component generates vertical classes', function () {
    $stepper = new Stepper(vertical: true);

    expect($stepper->stepperClasses())->toContain('flex-column')
        ->not->toContain('nav-justified');
});

test('stepper component renders correct view', function () {
    $stepper = new Stepper();

    expect($stepper->render()->name())->toBe('oneui::components.stepper');
});
