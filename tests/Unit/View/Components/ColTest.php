<?php

use XBot\OneUI\View\Components\Col;

test('col component initializes with default values', function () {
    $col = new Col();

    expect($col->cols)->toBeNull()
        ->and($col->sm)->toBeNull()
        ->and($col->md)->toBeNull()
        ->and($col->lg)->toBeNull();
});

test('col component generates auto width class by default', function () {
    $col = new Col();

    expect($col->colClasses())->toBe('col');
});

test('col component generates column width classes', function () {
    $col = new Col(cols: '6');

    expect($col->colClasses())->toContain('col-6');
});

test('col component generates responsive column classes', function () {
    $col = new Col(sm: '6', md: '4', lg: '3');

    expect($col->colClasses())->toContain('col-sm-6')
        ->toContain('col-md-4')
        ->toContain('col-lg-3');
});

test('col component generates offset classes', function () {
    $col = new Col(offset: '2', offsetMd: '3');

    expect($col->colClasses())->toContain('offset-2')
        ->toContain('offset-md-3');
});

test('col component generates order classes', function () {
    $col = new Col(order: '2');

    expect($col->colClasses())->toContain('order-2');
});

test('col component combines multiple classes correctly', function () {
    $col = new Col(cols: '6', md: '4', offset: '1', order: 'last');

    expect($col->colClasses())->toContain('col-6')
        ->toContain('col-md-4')
        ->toContain('offset-1')
        ->toContain('order-last');
});

test('col component renders correct view', function () {
    $col = new Col();

    expect($col->render()->name())->toBe('oneui::components.col');
});
