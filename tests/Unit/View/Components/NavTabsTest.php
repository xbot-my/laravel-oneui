<?php

use XBot\OneUI\View\Components\NavTabs;

test('nav tabs component initializes with default values', function () {
    $nav = new NavTabs();

    expect($nav->data)->toBeEmpty()
        ->and($nav->block)->toBeTrue()
        ->and($nav->justified)->toBeFalse()
        ->and($nav->alt)->toBeFalse();
});

test('nav tabs component processes array data', function () {
    $data = [
        ['id' => 'tab1', 'label' => 'Tab 1', 'active' => true],
        ['id' => 'tab2', 'label' => 'Tab 2'],
    ];
    $nav = new NavTabs(data: $data);

    expect($nav->items->count())->toBe(2);
});

test('nav tabs component generates default classes', function () {
    $nav = new NavTabs();

    expect($nav->navClasses())->toBe('nav nav-tabs nav-tabs-block');
});

test('nav tabs component generates alt classes', function () {
    $nav = new NavTabs(alt: true);

    expect($nav->navClasses())->toContain('nav-tabs-alt');
});

test('nav tabs component generates justified classes', function () {
    $nav = new NavTabs(justified: true);

    expect($nav->navClasses())->toContain('nav-justified');
});

test('nav tabs component generates non-block classes', function () {
    $nav = new NavTabs(block: false);

    expect($nav->navClasses())->not->toContain('nav-tabs-block');
});

test('nav tabs component renders correct view', function () {
    $nav = new NavTabs();

    expect($nav->render()->name())->toBe('oneui::components.nav-tabs');
});
