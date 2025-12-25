<?php

use XBot\OneUI\View\Components\SideOverlay;

test('side-overlay component initializes with default values', function () {
    $overlay = new SideOverlay();

    expect($overlay->hover)->toBeFalse()
        ->and($overlay->visible)->toBeFalse()
        ->and($overlay->showCloseButton)->toBeTrue();
});

test('side-overlay component generates default classes', function () {
    $overlay = new SideOverlay();

    expect($overlay->containerClasses())->toBe('');
});

test('side-overlay component generates hover classes', function () {
    $overlay = new SideOverlay(hover: true);

    expect($overlay->containerClasses())->toContain('side-overlay-hover');
});

test('side-overlay component generates visible classes', function () {
    $overlay = new SideOverlay(visible: true);

    expect($overlay->containerClasses())->toContain('side-overlay-o');
});

test('side-overlay component generates combined classes', function () {
    $overlay = new SideOverlay(hover: true, visible: true);

    expect($overlay->containerClasses())->toContain('side-overlay-hover')
        ->toContain('side-overlay-o');
});

test('side-overlay component returns default user avatar', function () {
    $overlay = new SideOverlay();

    expect($overlay->userAvatar)->toBe(asset('vendor/oneui/media/avatars/avatar10.jpg'));
});

test('side-overlay component returns custom user avatar', function () {
    $overlay = new SideOverlay(userAvatar: 'custom.jpg');

    expect($overlay->userAvatar)->toBe('custom.jpg');
});

test('side-overlay component renders correct view', function () {
    $overlay = new SideOverlay();

    expect($overlay->render()->name())->toBe('oneui::components.side-overlay');
});
