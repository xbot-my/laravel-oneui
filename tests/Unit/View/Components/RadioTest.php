<?php

use XBot\OneUI\View\Components\Radio;

test('radio component initializes with required name and value', function () {
    $radio = new Radio(name: 'gender', value: 'male');

    expect($radio->name)->toBe('gender')
        ->and($radio->value)->toBe('male')
        ->and($radio->id)->toBe('gender-male')
        ->and($radio->checked)->toBeFalse();
});

test('radio component generates custom id when provided', function () {
    $radio = new Radio(name: 'gender', value: 'male', id: 'gender-male-custom');

    expect($radio->id)->toBe('gender-male-custom');
});

test('radio component generates id from name and value', function () {
    $radio = new Radio(name: 'status', value: 'active');

    expect($radio->id)->toBe('status-active');
});

test('radio component handles checked state', function () {
    $radio = new Radio(name: 'gender', value: 'female', checked: true);

    expect($radio->checked)->toBeTrue();
});

test('radio component handles inline mode', function () {
    $radio = new Radio(name: 'option', value: '1', inline: true);

    expect($radio->inline)->toBeTrue();
});

test('radio component handles disabled state', function () {
    $radio = new Radio(name: 'test', value: '1', disabled: true);

    expect($radio->disabled)->toBeTrue();
});

test('radio component renders correct view', function () {
    $radio = new Radio(name: 'test', value: '1');

    expect($radio->render()->name())->toBe('oneui::components.radio');
});
