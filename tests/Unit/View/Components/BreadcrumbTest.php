<?php

use XBot\OneUI\View\Components\Breadcrumb;

test('breadcrumb component initializes with default values', function () {
    $breadcrumb = new Breadcrumb();

    expect($breadcrumb->data)->toBeEmpty()
        ->and($breadcrumb->alt)->toBeTrue()
        ->and($breadcrumb->items)->toBeInstanceOf(\XBot\OneUI\Support\ItemCollection::class);
});

test('breadcrumb component processes array data', function () {
    $data = [
        ['label' => 'Home', 'url' => '/'],
        ['label' => 'Products'],
    ];
    $breadcrumb = new Breadcrumb(data: $data);

    expect($breadcrumb->items->count())->toBe(2);
});

test('breadcrumb component generates default classes', function () {
    $breadcrumb = new Breadcrumb();

    expect($breadcrumb->breadcrumbClasses())->toBe('breadcrumb breadcrumb-alt');
});

test('breadcrumb component generates non-alt classes', function () {
    $breadcrumb = new Breadcrumb(alt: false);

    expect($breadcrumb->breadcrumbClasses())->toBe('breadcrumb');
});

test('breadcrumb component renders correct view', function () {
    $breadcrumb = new Breadcrumb();

    expect($breadcrumb->render()->name())->toBe('oneui::components.breadcrumb');
});
