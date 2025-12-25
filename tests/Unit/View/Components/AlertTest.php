<?php

use XBot\OneUI\View\Components\Alert;

test('alert component initializes with default values', function () {
    $alert = new Alert();

    expect($alert->type)->toBe('primary')
        ->and($alert->dismissible)->toBeFalse()
        ->and($alert->icon)->toBeNull()
        ->and($alert->title)->toBeNull();
});

test('alert component handles custom type', function () {
    $alert = new Alert(type: 'success');

    expect($alert->type)->toBe('success');
});

test('alert component handles dismissible mode', function () {
    $alert = new Alert(dismissible: true);

    expect($alert->dismissible)->toBeTrue();
});

test('alert component handles custom icon', function () {
    $alert = new Alert(icon: 'fa fa-star');

    expect($alert->icon)->toBe('fa fa-star');
});

test('alert component handles title', function () {
    $alert = new Alert(title: 'Warning');

    expect($alert->title)->toBe('Warning');
});

test('alert component returns default icon for success type', function () {
    $alert = new Alert(type: 'success');

    expect($alert->defaultIcon())->toBe('fa fa-fw fa-check');
});

test('alert component returns default icon for danger type', function () {
    $alert = new Alert(type: 'danger');

    expect($alert->defaultIcon())->toBe('fa fa-fw fa-times-circle');
});

test('alert component returns default icon for warning type', function () {
    $alert = new Alert(type: 'warning');

    expect($alert->defaultIcon())->toBe('fa fa-fw fa-exclamation-circle');
});

test('alert component returns default icon for info type', function () {
    $alert = new Alert(type: 'info');

    expect($alert->defaultIcon())->toBe('fa fa-fw fa-info-circle');
});

test('alert component returns null for primary type', function () {
    $alert = new Alert(type: 'primary');

    expect($alert->defaultIcon())->toBeNull();
});

test('alert component renders correct view', function () {
    $alert = new Alert();

    expect($alert->render()->name())->toBe('oneui::components.alert');
});
