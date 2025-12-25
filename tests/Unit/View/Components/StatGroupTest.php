<?php

use XBot\OneUI\View\Components\StatGroup;

test('stat group component initializes with default values', function () {
    $group = new StatGroup();

    expect($group->items)->toBeEmpty()
        ->and($group->href)->toBeNull();
});

test('stat group component handles items array', function () {
    $items = [
        ['value' => 100, 'label' => 'Users', 'icon' => 'fa fa-user'],
        ['value' => 50, 'label' => 'Posts', 'icon' => 'fa fa-file'],
    ];
    $group = new StatGroup(items: $items);

    expect($group->items)->toHaveCount(2);
});

test('stat group component handles href', function () {
    $group = new StatGroup(href: '/dashboard');

    expect($group->href)->toBe('/dashboard');
});

test('stat group component renders correct view', function () {
    $group = new StatGroup();

    expect($group->render()->name())->toBe('oneui::components.stat-group');
});
