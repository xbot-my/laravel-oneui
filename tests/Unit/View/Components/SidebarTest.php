<?php

use XBot\OneUI\View\Components\Sidebar;

test('sidebar component initializes with default values', function () {
    $sidebar = new Sidebar();

    expect($sidebar->dark)->toBeTrue()
        ->and($sidebar->mini)->toBeFalse()
        ->and($sidebar->visible)->toBeTrue()
        ->and($sidebar->right)->toBeFalse();
});

test('sidebar component generates default classes', function () {
    $sidebar = new Sidebar();

    expect($sidebar->containerClasses())->toContain('sidebar-dark')
        ->toContain('sidebar-o');
});

test('sidebar component generates mini mode classes', function () {
    $sidebar = new Sidebar(mini: true);

    expect($sidebar->containerClasses())->toContain('sidebar-mini');
});

test('sidebar component generates light mode classes', function () {
    $sidebar = new Sidebar(dark: false);

    expect($sidebar->containerClasses())->not->toContain('sidebar-dark');
});

test('sidebar component generates hidden classes', function () {
    $sidebar = new Sidebar(visible: false);

    expect($sidebar->containerClasses())->not->toContain('sidebar-o');
});

test('sidebar component generates visible on xs classes', function () {
    $sidebar = new Sidebar(visibleXs: true);

    expect($sidebar->containerClasses())->toContain('sidebar-o-xs');
});

test('sidebar component generates right side classes', function () {
    $sidebar = new Sidebar(right: true);

    expect($sidebar->containerClasses())->toContain('sidebar-r');
});

test('sidebar component returns custom logo', function () {
    $sidebar = new Sidebar(logo: 'MyApp');

    expect($sidebar->appName())->toBe('MyApp');
});

test('sidebar component returns default app name', function () {
    $sidebar = new Sidebar();

    expect($sidebar->appName())->toBe(config('app.name'));
});

test('sidebar component renders correct view', function () {
    $sidebar = new Sidebar();

    expect($sidebar->render()->name())->toBe('oneui::components.sidebar');
});
