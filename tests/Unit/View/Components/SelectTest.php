<?php

use XBot\OneUI\View\Components\Select;

test('select component initializes with required name', function () {
    $select = new Select(name: 'country');

    expect($select->name)->toBe('country')
        ->and($select->id)->toBe('country')
        ->and($select->options)->toBeEmpty()
        ->and($select->multiple)->toBeFalse();
});

test('select component generates custom id when provided', function () {
    $select = new Select(name: 'country', id: 'country-select');

    expect($select->id)->toBe('country-select');
});

test('select component handles options array', function () {
    $options = ['us' => 'USA', 'my' => 'Malaysia'];
    $select = new Select(name: 'country', options: $options);

    expect($select->options)->toBe($options);
});

test('select component handles selected value', function () {
    $select = new Select(name: 'country', selected: 'us');

    expect($select->selected)->toBe('us');
});

test('select component handles multiple mode', function () {
    $select = new Select(name: 'tags', multiple: true);

    expect($select->multiple)->toBeTrue();
});

test('select component handles size variations', function () {
    $sm = new Select(name: 'test', size: 'sm');
    $lg = new Select(name: 'test', size: 'lg');

    expect($sm->size)->toBe('sm');
    expect($lg->size)->toBe('lg');
});

test('select component handles disabled state', function () {
    $select = new Select(name: 'test', disabled: true);

    expect($select->disabled)->toBeTrue();
});

test('select component renders correct view', function () {
    $select = new Select(name: 'test');

    expect($select->render()->name())->toBe('oneui::components.select');
});
