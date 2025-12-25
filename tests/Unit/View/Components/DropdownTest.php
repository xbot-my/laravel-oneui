<?php

use XBot\OneUI\View\Components\Dropdown;

test('dropdown component initializes with default values', function () {
    $dropdown = new Dropdown();

    expect($dropdown->align)->toBe('start')
        ->and($dropdown->up)->toBeFalse();
});

test('dropdown component handles align end', function () {
    $dropdown = new Dropdown(align: 'end');

    expect($dropdown->align)->toBe('end');
});

test('dropdown component handles up direction', function () {
    $dropdown = new Dropdown(up: true);

    expect($dropdown->up)->toBeTrue();
});

test('dropdown component generates default classes', function () {
    $dropdown = new Dropdown();

    expect($dropdown->dropdownClasses())->toBe('dropdown');
});

test('dropdown component generates dropup classes', function () {
    $dropdown = new Dropdown(up: true);

    expect($dropdown->dropdownClasses())->toBe('dropup');
});

test('dropdown component generates default menu classes', function () {
    $dropdown = new Dropdown();

    expect($dropdown->menuClasses())->toBe('dropdown-menu');
});

test('dropdown component generates end aligned menu classes', function () {
    $dropdown = new Dropdown(align: 'end');

    expect($dropdown->menuClasses())->toContain('dropdown-menu-end');
});

test('dropdown component renders correct view', function () {
    $dropdown = new Dropdown();

    expect($dropdown->render()->name())->toBe('oneui::components.dropdown');
});
