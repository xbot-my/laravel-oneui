<?php

use XBot\OneUI\View\Components\Rating;

test('rating component initializes with required name', function () {
    $rating = new Rating(name: 'product_rating');

    expect($rating->name)->toBe('product_rating')
        ->and($rating->id)->toBe('product_rating')
        ->and($rating->score)->toBe(0.0)
        ->and($rating->number)->toBe(5);
});

test('rating component generates custom id when provided', function () {
    $rating = new Rating(name: 'rating', id: 'custom-rating');

    expect($rating->id)->toBe('custom-rating');
});

test('rating component handles score', function () {
    $rating = new Rating(name: 'rating', score: 4.5);

    expect($rating->score)->toBe(4.5);
});

test('rating component handles custom star number', function () {
    $rating = new Rating(name: 'rating', number: 10);

    expect($rating->number)->toBe(10);
});

test('rating component handles half star mode', function () {
    $rating = new Rating(name: 'rating', half: true);

    expect($rating->half)->toBeTrue();
});

test('rating component handles readonly mode', function () {
    $rating = new Rating(name: 'rating', readonly: true);

    expect($rating->readonly)->toBeTrue();
});

test('rating component handles cancel button', function () {
    $rating = new Rating(name: 'rating', cancel: true);

    expect($rating->cancel)->toBeTrue();
});

test('rating component handles cancel place', function () {
    $rating = new Rating(name: 'rating', cancel: true, cancelPlace: 'right');

    expect($rating->cancelPlace)->toBe('right');
});

test('rating component handles star type', function () {
    $rating = new Rating(name: 'rating', starType: 'emoji');

    expect($rating->starType)->toBe('emoji');
});

test('rating component generates data options correctly', function () {
    $rating = new Rating(
        name: 'rating',
        score: 3.5,
        number: 5,
        half: true,
        readonly: false
    );

    $options = $rating->dataOptions();
    expect($options)->toContain('score:3.5')
        ->toContain('number:5')
        ->toContain('half:true')
        ->toContain('readOnly:false');
});

test('rating component includes hints in data options', function () {
    $rating = new Rating(
        name: 'rating',
        hints: ['Poor', 'Fair', 'Good', 'Very Good', 'Excellent']
    );

    $options = $rating->dataOptions();
    expect($options)->toContain('hints:');
});

test('rating component renders correct view', function () {
    $rating = new Rating(name: 'test');

    expect($rating->render()->name())->toBe('oneui::components.rating');
});
