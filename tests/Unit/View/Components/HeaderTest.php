<?php

use XBot\OneUI\View\Components\Header;

test('header component initializes with default values', function () {
    $header = new Header();

    expect($header->fixed)->toBeTrue()
        ->and($header->dark)->toBeFalse()
        ->and($header->title)->toBeNull()
        ->and($header->showLogo)->toBeTrue()
        ->and($header->showToggle)->toBeTrue();
});

test('header component generates default classes', function () {
    $header = new Header();

    expect($header->containerClasses())->toContain('page-header-fixed');
});

test('header component generates dark mode classes', function () {
    $header = new Header(dark: true);

    expect($header->containerClasses())->toContain('page-header-dark');
});

test('header component generates non-fixed classes', function () {
    $header = new Header(fixed: false);

    expect($header->containerClasses())->not->toContain('page-header-fixed');
});

test('header component returns custom user name', function () {
    $header = new Header(userName: 'John Doe');

    expect($header->displayName())->toBe('John Doe');
});

test('header component returns default user avatar', function () {
    $header = new Header();

    expect($header->userAvatar)->toBe(asset('vendor/oneui/media/avatars/avatar10.jpg'));
});

test('header component returns custom user avatar', function () {
    $header = new Header(userAvatar: 'custom-avatar.jpg');

    expect($header->userAvatar)->toBe('custom-avatar.jpg');
});

test('header component renders correct view', function () {
    $header = new Header();

    expect($header->render()->name())->toBe('oneui::components.header');
});
