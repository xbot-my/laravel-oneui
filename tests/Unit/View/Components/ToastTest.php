<?php

use XBot\OneUI\View\Components\Toast;

test('toast component initializes with default values', function () {
    $toast = new Toast();

    expect($toast->type)->toBe('primary')
        ->and($toast->title)->toBe('')
        ->and($toast->message)->toBe('')
        ->and($toast->autohide)->toBeTrue()
        ->and($toast->delay)->toBe(5000);
});

test('toast component handles custom type', function () {
    $toast = new Toast(type: 'success');

    expect($toast->type)->toBe('success');
});

test('toast component handles title and message', function () {
    $toast = new Toast(title: 'Success!', message: 'Operation completed.');

    expect($toast->title)->toBe('Success!')
        ->and($toast->message)->toBe('Operation completed.');
});

test('toast component handles autohide', function () {
    $toast = new Toast(autohide: false);

    expect($toast->autohide)->toBeFalse();
});

test('toast component handles custom delay', function () {
    $toast = new Toast(delay: 3000);

    expect($toast->delay)->toBe(3000);
});

test('toast component returns icon class for success type', function () {
    $toast = new Toast(type: 'success');

    expect($toast->iconClass())->toBe('fa fa-check-circle text-success');
});

test('toast component returns icon class for danger type', function () {
    $toast = new Toast(type: 'danger');

    expect($toast->iconClass())->toBe('fa fa-times-circle text-danger');
});

test('toast component returns icon class for error type', function () {
    $toast = new Toast(type: 'error');

    expect($toast->iconClass())->toBe('fa fa-times-circle text-danger');
});

test('toast component returns icon class for warning type', function () {
    $toast = new Toast(type: 'warning');

    expect($toast->iconClass())->toBe('fa fa-exclamation-circle text-warning');
});

test('toast component returns icon class for info type', function () {
    $toast = new Toast(type: 'info');

    expect($toast->iconClass())->toBe('fa fa-info-circle text-info');
});

test('toast component renders correct view', function () {
    $toast = new Toast();

    expect($toast->render()->name())->toBe('oneui::components.toast');
});
