<?php

use XBot\OneUI\Support\DataItem;

test('DataItem can be created from array', function () {
    $item = DataItem::make(['id' => 1, 'name' => 'John']);

    expect($item->getValue('id'))->toBe(1)
        ->and($item->getValue('name'))->toBe('John');
});

test('DataItem supports dot notation', function () {
    $item = DataItem::make([
        'user' => [
            'profile' => [
                'name' => 'John Doe'
            ]
        ]
    ]);

    expect($item->getValue('user.profile.name'))->toBe('John Doe');
});

test('DataItem returns default value for missing keys', function () {
    $item = DataItem::make(['id' => 1]);

    expect($item->getValue('missing', 'default'))->toBe('default');
});

test('DataItem checks if key exists', function () {
    $item = DataItem::make(['id' => 1, 'name' => 'John']);

    expect($item->hasKey('id'))->toBeTrue()
        ->and($item->hasKey('missing'))->toBeFalse();
});

test('DataItem returns identifier', function () {
    $item = new DataItem(['id' => 123, 'name' => 'Test'], 'id');

    expect($item->getIdentifier())->toBe(123);
});

test('DataItem converts to array', function () {
    $data = ['id' => 1, 'name' => 'John'];
    $item = DataItem::make($data);

    expect($item->toArray())->toBe($data);
});
