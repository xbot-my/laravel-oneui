<?php

use XBot\OneUI\View\Components\Form;

test('form component initializes with default values', function () {
    $form = new Form();

    expect($form->action)->toBe('')
        ->and($form->method)->toBe('POST')
        ->and($form->hasFiles)->toBeFalse();
});

test('form component handles custom action', function () {
    $form = new Form(action: '/submit');

    expect($form->action)->toBe('/submit');
});

test('form component handles GET method', function () {
    $form = new Form(method: 'GET');

    expect($form->method)->toBe('GET');
});

test('form component handles file upload mode', function () {
    $form = new Form(hasFiles: true);

    expect($form->hasFiles)->toBeTrue();
});

test('form component renders correct view', function () {
    $form = new Form();

    expect($form->render()->name())->toBe('oneui::components.form');
});
