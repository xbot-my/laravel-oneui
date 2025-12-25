<?php

use XBot\OneUI\View\Components\Loading;

test('loading component initializes with default values', function () {
    $loading = new Loading();

    expect($loading->message)->toBe('Loading...')
        ->and($loading->color)->toBe('primary')
        ->and($loading->show)->toBeTrue();
});

test('loading component handles custom message', function () {
    $loading = new Loading(message: 'Please wait...');

    expect($loading->message)->toBe('Please wait...');
});

test('loading component handles custom color', function () {
    $loading = new Loading(color: 'success');

    expect($loading->color)->toBe('success');
});

test('loading component handles show state', function () {
    $loading = new Loading(show: false);

    expect($loading->show)->toBeFalse();
});

test('loading component renders correct view', function () {
    $loading = new Loading();

    expect($loading->render()->name())->toBe('oneui::components.loading');
});
