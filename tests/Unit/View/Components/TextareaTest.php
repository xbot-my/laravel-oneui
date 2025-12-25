<?php

use XBot\OneUI\View\Components\Textarea;

test('textarea component initializes with required name', function () {
    $textarea = new Textarea(name: 'content');

    expect($textarea->name)->toBe('content')
        ->and($textarea->id)->toBe('content')
        ->and($textarea->rows)->toBe(4)
        ->and($textarea->alt)->toBeFalse();
});

test('textarea component generates custom id when provided', function () {
    $textarea = new Textarea(name: 'content', id: 'content-area');

    expect($textarea->id)->toBe('content-area');
});

test('textarea component handles custom rows', function () {
    $textarea = new Textarea(name: 'content', rows: 10);

    expect($textarea->rows)->toBe(10);
});

test('textarea component handles alt mode', function () {
    $textarea = new Textarea(name: 'test', alt: true);

    expect($textarea->alt)->toBeTrue();
});

test('textarea component handles disabled state', function () {
    $textarea = new Textarea(name: 'test', disabled: true);

    expect($textarea->disabled)->toBeTrue();
});

test('textarea component handles readonly state', function () {
    $textarea = new Textarea(name: 'test', readonly: true);

    expect($textarea->readonly)->toBeTrue();
});

test('textarea component renders correct view', function () {
    $textarea = new Textarea(name: 'test');

    expect($textarea->render()->name())->toBe('oneui::components.textarea');
});
