<?php

use XBot\OneUI\View\Components\Tabs;

test('tabs component initializes with default values', function () {
    $tabs = new Tabs();

    expect($tabs->id)->toBe('')
        ->and($tabs->style)->toBe('default')
        ->and($tabs->block)->toBeFalse()
        ->and($tabs->justified)->toBeFalse();
});

test('tabs component generates default classes', function () {
    $tabs = new Tabs();

    expect($tabs->navClasses())->toBe('nav nav-tabs');
});

test('tabs component generates block style classes', function () {
    $tabs = new Tabs(style: 'block');

    expect($tabs->navClasses())->toContain('nav-tabs-block');
});

test('tabs component generates alt style classes', function () {
    $tabs = new Tabs(style: 'alt');

    expect($tabs->navClasses())->toContain('nav-tabs-alt');
});

test('tabs component generates justified classes', function () {
    $tabs = new Tabs(justified: true);

    expect($tabs->navClasses())->toContain('nav-justified');
});

test('tabs component renders correct view', function () {
    $tabs = new Tabs();

    expect($tabs->render()->name())->toBe('oneui::components.tabs');
});
