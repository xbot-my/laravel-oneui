<?php

use XBot\OneUI\Support\DataItem;
use XBot\OneUI\Support\ItemCollection;

test('ItemCollection can be created from array', function () {
    $collection = new ItemCollection([
        ['id' => 1, 'name' => 'John'],
        ['id' => 2, 'name' => 'Jane'],
    ]);

    expect($collection->count())->toBe(2);
});

test('ItemCollection returns first item', function () {
    $collection = new ItemCollection([
        ['id' => 1, 'name' => 'John'],
        ['id' => 2, 'name' => 'Jane'],
    ]);

    expect($collection->first()->getValue('name'))->toBe('John');
});

test('ItemCollection finds item by identifier', function () {
    $collection = new ItemCollection([
        ['id' => 1, 'name' => 'John'],
        ['id' => 2, 'name' => 'Jane'],
    ], 'id');

    $item = $collection->find(2);

    expect($item)->not->toBeNull()
        ->and($item->getValue('name'))->toBe('Jane');
});

test('ItemCollection checks if empty', function () {
    $emptyCollection = new ItemCollection([]);
    $filledCollection = new ItemCollection([['id' => 1]]);

    expect($emptyCollection->isEmpty())->toBeTrue()
        ->and($filledCollection->isNotEmpty())->toBeTrue();
});

test('ItemCollection filters items', function () {
    $collection = new ItemCollection([
        ['id' => 1, 'status' => 'active'],
        ['id' => 2, 'status' => 'inactive'],
        ['id' => 3, 'status' => 'active'],
    ]);

    $active = $collection->filter(fn ($item) => $item->getValue('status') === 'active');

    expect($active->count())->toBe(2);
});

test('ItemCollection plucks values', function () {
    $collection = new ItemCollection([
        ['id' => 1, 'name' => 'John'],
        ['id' => 2, 'name' => 'Jane'],
    ]);

    $names = $collection->pluck('name');

    expect($names)->toBe(['John', 'Jane']);
});
