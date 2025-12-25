<?php

use XBot\OneUI\View\Components\NavItem;

test('nav item component initializes with default values', function () {
    $item = new NavItem();

    expect($item->href)->toBe('#')
        ->and($item->icon)->toBeNull()
        ->and($item->active)->toBeFalse()
        ->and($item->submenu)->toBeFalse();
});

test('nav item component handles custom href', function () {
    $item = new NavItem(href: '/dashboard');

    expect($item->href)->toBe('/dashboard');
});

test('nav item component handles icon', function () {
    $item = new NavItem(icon: 'si-speedometer');

    expect($item->icon)->toBe('si-speedometer');
});

test('nav item component generates default link classes', function () {
    $item = new NavItem();

    expect($item->linkClasses())->toBe('nav-main-link');
});

test('nav item component generates active classes', function () {
    $item = new NavItem(active: true);

    expect($item->linkClasses())->toContain('active');
});

test('nav item component generates submenu classes', function () {
    $item = new NavItem(submenu: true);

    expect($item->linkClasses())->toContain('nav-main-link-submenu');
});

test('nav item component renders correct view', function () {
    $item = new NavItem();

    expect($item->render()->name())->toBe('oneui::components.nav-item');
});
