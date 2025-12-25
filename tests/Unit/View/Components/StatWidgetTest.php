<?php

use XBot\OneUI\View\Components\StatWidget;

test('stat widget component initializes with required parameters', function () {
    $widget = new StatWidget(value: 1234, label: 'Users');

    expect($widget->value)->toBe(1234)
        ->and($widget->label)->toBe('Users')
        ->and($widget->icon)->toBeNull()
        ->and($widget->color)->toBeNull();
});

test('stat widget component handles icon', function () {
    $widget = new StatWidget(value: 100, label: 'Test', icon: 'fa fa-star');

    expect($widget->icon)->toBe('fa fa-star');
});

test('stat widget component handles color', function () {
    $widget = new StatWidget(value: 100, label: 'Test', color: 'primary');

    expect($widget->color)->toBe('primary');
});

test('stat widget component generates block classes with link', function () {
    $widget = new StatWidget(value: 100, label: 'Test', link: true);

    expect($widget->blockClasses())->toContain('block-link-pop');
});

test('stat widget component generates block classes with color', function () {
    $widget = new StatWidget(value: 100, label: 'Test', color: 'primary');

    expect($widget->blockClasses())->toContain('bg-primary');
});

test('stat widget component generates text classes', function () {
    $widget = new StatWidget(value: 100, label: 'Test');

    expect($widget->textClasses())->toBe('');
});

test('stat widget component generates white text classes when colored', function () {
    $widget = new StatWidget(value: 100, label: 'Test', color: 'success');

    expect($widget->textClasses())->toBe('text-white');
});

test('stat widget component generates icon classes', function () {
    $widget = new StatWidget(value: 100, label: 'Test');

    expect($widget->iconClasses())->toBe('text-muted');
});

test('stat widget component uses anchor tag when href provided', function () {
    $widget = new StatWidget(value: 100, label: 'Test', href: '/stats');

    expect($widget->tag())->toBe('a');
});

test('stat widget component uses div tag by default', function () {
    $widget = new StatWidget(value: 100, label: 'Test');

    expect($widget->tag())->toBe('div');
});

test('stat widget component renders correct view', function () {
    $widget = new StatWidget(value: 100, label: 'Test');

    expect($widget->render()->name())->toBe('oneui::components.stat-widget');
});
