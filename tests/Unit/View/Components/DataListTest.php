<?php

use XBot\OneUI\View\Components\DataList;

test('data list component initializes with default values', function () {
    $list = new DataList();

    expect($list->items)->toBeEmpty()
        ->and($list->orientation)->toBe('vertical')
        ->and($list->variant)->toBe('default')
        ->and($list->hover)->toBeFalse();
});

test('data list component handles items array', function () {
    $items = ['Name' => 'John', 'Email' => 'john@example.com'];
    $list = new DataList(items: $items);

    expect($list->items)->toBe($items);
});

test('data list component handles horizontal orientation', function () {
    $list = new DataList(orientation: 'horizontal');

    expect($list->orientation)->toBe('horizontal')
        ->and($list->isHorizontal())->toBeTrue();
});

test('data list component handles variant', function () {
    $list = new DataList(variant: 'bordered');

    expect($list->variant)->toBe('bordered');
});

test('data list component handles hover mode', function () {
    $list = new DataList(hover: true);

    expect($list->hover)->toBeTrue();
});

test('data list component generates label class', function () {
    $list = new DataList();

    expect($list->getLabelClass('name'))->toBe('data-list-label');
});

test('data list component generates custom label class', function () {
    $list = new DataList(labelClass: 'fw-bold');

    expect($list->getLabelClass('name'))->toContain('fw-bold');
});

test('data list component generates value class', function () {
    $list = new DataList();

    expect($list->getValueClass())->toBe('data-list-value');
});

test('data list component generates custom value class', function () {
    $list = new DataList(valueClass: 'text-muted');

    expect($list->getValueClass())->toContain('text-muted');
});

test('data list component generates default container classes', function () {
    $list = new DataList();

    expect($list->getContainerClasses())->toBe('data-list data-list-default');
});

test('data list component generates bordered container classes', function () {
    $list = new DataList(variant: 'bordered');

    expect($list->getContainerClasses())->toContain('data-list-bordered');
});

test('data list component generates hover container classes', function () {
    $list = new DataList(hover: true);

    expect($list->getContainerClasses())->toContain('data-list-hover');
});

test('data list component generates horizontal container classes', function () {
    $list = new DataList(orientation: 'horizontal');

    expect($list->getContainerClasses())->toContain('data-list-horizontal');
});

test('data list component renders correct view', function () {
    $list = new DataList();

    expect($list->render()->name())->toBe('oneui::components.data-list');
});
