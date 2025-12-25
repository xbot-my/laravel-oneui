<?php

use XBot\OneUI\View\Components\Checkbox;

test('checkbox component initializes with required name', function () {
    $checkbox = new Checkbox(name: 'agree');

    expect($checkbox->name)->toBe('agree')
        ->and($checkbox->id)->toBe('agree')
        ->and($checkbox->value)->toBe('1')
        ->and($checkbox->checked)->toBeFalse();
});

test('checkbox component generates custom id when provided', function () {
    $checkbox = new Checkbox(name: 'agree', id: 'agree-checkbox');

    expect($checkbox->id)->toBe('agree-checkbox');
});

test('checkbox component handles custom value', function () {
    $checkbox = new Checkbox(name: 'status', value: 'active');

    expect($checkbox->value)->toBe('active');
});

test('checkbox component handles checked state', function () {
    $checkbox = new Checkbox(name: 'agree', checked: true);

    expect($checkbox->checked)->toBeTrue();
});

test('checkbox component handles switch mode', function () {
    $checkbox = new Checkbox(name: 'status', switch: true);

    expect($checkbox->switch)->toBeTrue();
});

test('checkbox component handles inline mode', function () {
    $checkbox = new Checkbox(name: 'option', inline: true);

    expect($checkbox->inline)->toBeTrue();
});

test('checkbox component handles disabled state', function () {
    $checkbox = new Checkbox(name: 'test', disabled: true);

    expect($checkbox->disabled)->toBeTrue();
});

test('checkbox component renders correct view', function () {
    $checkbox = new Checkbox(name: 'test');

    expect($checkbox->render()->name())->toBe('oneui::components.checkbox');
});
