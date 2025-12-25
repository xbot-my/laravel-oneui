<?php

use XBot\OneUI\View\Components\Input;

test('input component initializes with required name', function () {
    $input = new Input(name: 'email');

    expect($input->name)->toBe('email')
        ->and($input->id)->toBe('email')
        ->and($input->type)->toBe('text')
        ->and($input->alt)->toBeFalse();
});

test('input component generates custom id when provided', function () {
    $input = new Input(name: 'email', id: 'email-input');

    expect($input->id)->toBe('email-input');
});

test('input component supports various input types', function () {
    $email = new Input(name: 'email', type: 'email');
    $password = new Input(name: 'password', type: 'password');
    $number = new Input(name: 'age', type: 'number');

    expect($email->type)->toBe('email');
    expect($password->type)->toBe('password');
    expect($number->type)->toBe('number');
});

test('input component handles alt mode', function () {
    $input = new Input(name: 'test', alt: true);

    expect($input->alt)->toBeTrue();
});

test('input component handles disabled state', function () {
    $input = new Input(name: 'test', disabled: true);

    expect($input->disabled)->toBeTrue();
});

test('input component handles readonly state', function () {
    $input = new Input(name: 'test', readonly: true);

    expect($input->readonly)->toBeTrue();
});

test('input component handles size variations', function () {
    $sm = new Input(name: 'test', size: 'sm');
    $lg = new Input(name: 'test', size: 'lg');

    expect($sm->size)->toBe('sm');
    expect($lg->size)->toBe('lg');
});

test('input component renders correct view', function () {
    $input = new Input(name: 'test');

    expect($input->render()->name())->toBe('oneui::components.input');
});
