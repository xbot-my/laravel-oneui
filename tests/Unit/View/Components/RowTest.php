<?php

use XBot\OneUI\View\Components\Row;

test('row component initializes with default values', function () {
    $row = new Row();

    expect($row->cols)->toBeNull()
        ->and($row->gap)->toBeNull()
        ->and($row->items)->toBeFalse();
});

test('row component generates default classes', function () {
    $row = new Row();

    expect($row->rowClasses())->toBe('row');
});

test('row component generates column classes', function () {
    $row = new Row(cols: '2');

    expect($row->rowClasses())->toContain('row-cols-2');
});

test('row component generates responsive column classes', function () {
    $row = new Row(colsMd: '3', colsLg: '4');

    expect($row->rowClasses())->toContain('row-cols-md-3')
        ->toContain('row-cols-lg-4');
});

test('row component generates gap classes', function () {
    $row = new Row(gap: '4');

    expect($row->rowClasses())->toContain('g-4');
});

test('row component generates directional gap classes', function () {
    $row = new Row(gapX: '3', gapY: '2');

    expect($row->rowClasses())->toContain('gx-3')
        ->toContain('gy-2');
});

test('row component generates items push class', function () {
    $row = new Row(items: true);

    expect($row->rowClasses())->toContain('items-push');
});

test('row component renders correct view', function () {
    $row = new Row();

    expect($row->render()->name())->toBe('oneui::components.row');
});
