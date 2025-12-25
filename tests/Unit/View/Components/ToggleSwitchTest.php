<?php

use XBot\OneUI\View\Components\ToggleSwitch;

test('toggle switch component initializes with required name', function () {
    $switch = new ToggleSwitch(name: 'active');

    expect($switch->name)->toBe('active')
        ->and($switch->id)->toBe('active')
        ->and($switch->checked)->toBeFalse()
        ->and($switch->disabled)->toBeFalse();
});

test('toggle switch component generates custom id when provided', function () {
    $switch = new ToggleSwitch(name: 'notifications', id: 'notif-toggle');

    expect($switch->id)->toBe('notif-toggle');
});

test('toggle switch component handles checked state', function () {
    $switch = new ToggleSwitch(name: 'active', checked: true);

    expect($switch->checked)->toBeTrue();
});

test('toggle switch component handles disabled state', function () {
    $switch = new ToggleSwitch(name: 'active', disabled: true);

    expect($switch->disabled)->toBeTrue();
});

test('toggle switch component handles custom value', function () {
    $switch = new ToggleSwitch(name: 'active', value: 'yes');

    expect($switch->value)->toBe('yes');
});

test('toggle switch component generates default wrapper classes', function () {
    $switch = new ToggleSwitch(name: 'active');

    expect($switch->wrapperClasses())->toBe('form-check form-switch');
});

test('toggle switch component generates small size classes', function () {
    $switch = new ToggleSwitch(name: 'active', size: 'sm');

    expect($switch->wrapperClasses())->toBe('form-check form-switch form-switch-sm');
});

test('toggle switch component generates large size classes', function () {
    $switch = new ToggleSwitch(name: 'active', size: 'lg');

    expect($switch->wrapperClasses())->toBe('form-check form-switch form-switch-lg');
});

test('toggle switch component generates default input classes', function () {
    $switch = new ToggleSwitch(name: 'active');

    expect($switch->inputClasses())->toBe('form-check-input');
});

test('toggle switch component generates color input classes', function () {
    $switch = new ToggleSwitch(name: 'active', color: 'success');

    expect($switch->inputClasses())->toBe('form-check-input form-check-input-success');
});

test('toggle switch component renders correct view', function () {
    $switch = new ToggleSwitch(name: 'active');

    expect($switch->render()->name())->toBe('oneui::components.toggle-switch');
});
