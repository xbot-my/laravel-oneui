<?php

use XBot\OneUI\View\Components\FileInput;

test('file input component initializes with required name', function () {
    $input = new FileInput(name: 'avatar');

    expect($input->name)->toBe('avatar')
        ->and($input->label)->toBe('')
        ->and($input->multiple)->toBeFalse();
});

test('file input component handles label', function () {
    $input = new FileInput(name: 'avatar', label: 'Profile Picture');

    expect($input->label)->toBe('Profile Picture');
});

test('file input component handles multiple mode', function () {
    $input = new FileInput(name: 'documents', multiple: true);

    expect($input->multiple)->toBeTrue();
});

test('file input component handles accept attribute', function () {
    $input = new FileInput(name: 'image', accept: 'image/*');

    expect($input->accept)->toBe('image/*');
});

test('file input component handles error state', function () {
    $input = new FileInput(name: 'file', error: 'File is required');

    expect($input->error)->toBe('File is required');
});

test('file input component renders correct view', function () {
    $input = new FileInput(name: 'test');

    expect($input->render()->name())->toBe('oneui::components.file-input');
});
