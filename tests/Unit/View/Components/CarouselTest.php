<?php

use XBot\OneUI\View\Components\Carousel;

test('carousel component initializes with required id', function () {
    $carousel = new Carousel(id: 'my-carousel');

    expect($carousel->id)->toBe('my-carousel')
        ->and($carousel->slidesToShow)->toBe(1)
        ->and($carousel->dots)->toBeTrue()
        ->and($carousel->arrows)->toBeTrue();
});

test('carousel component handles slides to show', function () {
    $carousel = new Carousel(id: 'test', slidesToShow: 3);

    expect($carousel->slidesToShow)->toBe(3);
});

test('carousel component handles autoplay', function () {
    $carousel = new Carousel(id: 'test', autoplay: true);

    expect($carousel->autoplay)->toBeTrue();
});

test('carousel component handles autoplay speed', function () {
    $carousel = new Carousel(id: 'test', autoplaySpeed: 5000);

    expect($carousel->autoplaySpeed)->toBe(5000);
});

test('carousel component handles fade mode', function () {
    $carousel = new Carousel(id: 'test', fade: true);

    expect($carousel->fade)->toBeTrue();
});

test('carousel component handles vertical mode', function () {
    $carousel = new Carousel(id: 'test', vertical: true);

    expect($carousel->vertical)->toBeTrue();
});

test('carousel component handles center mode', function () {
    $carousel = new Carousel(id: 'test', centerMode: true);

    expect($carousel->centerMode)->toBeTrue();
});

test('carousel component handles draggable', function () {
    $carousel = new Carousel(id: 'test', draggable: false);

    expect($carousel->draggable)->toBeFalse();
});

test('carousel component handles custom arrows', function () {
    $carousel = new Carousel(
        id: 'test',
        prevArrow: '<span class="custom-prev">',
        nextArrow: '<span class="custom-next">'
    );

    expect($carousel->prevArrow)->toBe('<span class="custom-prev">')
        ->and($carousel->nextArrow)->toBe('<span class="custom-next">');
});

test('carousel component handles breakpoints', function () {
    $breakpoints = [
        [768, ['slidesToShow' => 2]],
        [1024, ['slidesToShow' => 3]],
    ];
    $carousel = new Carousel(id: 'test', breakpoints: $breakpoints);

    expect($carousel->breakpoints)->toBe($breakpoints);
});

test('carousel component generates slick options correctly', function () {
    $carousel = new Carousel(
        id: 'test',
        slidesToShow: 2,
        dots: false,
        arrows: false
    );

    $options = $carousel->slickOptions();
    $decoded = json_decode($options, true);

    expect($decoded['slidesToShow'])->toBe(2)
        ->and($decoded['dots'])->toBeFalse()
        ->and($decoded['arrows'])->toBeFalse();
});

test('carousel component includes custom options in slick options', function () {
    $carousel = new Carousel(
        id: 'test',
        options: ['customOption' => 'customValue']
    );

    $options = $carousel->slickOptions();
    $decoded = json_decode($options, true);

    expect($decoded['customOption'])->toBe('customValue');
});

test('carousel component renders correct view', function () {
    $carousel = new Carousel(id: 'test');

    expect($carousel->render()->name())->toBe('oneui::components.carousel');
});
