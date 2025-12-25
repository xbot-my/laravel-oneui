<?php

use XBot\OneUI\View\Components\Hero;

test('hero component initializes with default values', function () {
    $hero = new Hero();

    expect($hero->title)->toBeNull()
        ->and($hero->subtitle)->toBeNull()
        ->and($hero->image)->toBeNull()
        ->and($hero->overlay)->toBeNull()
        ->and($hero->size)->toBe('')
        ->and($hero->dark)->toBeFalse();
});

test('hero component generates default classes', function () {
    $hero = new Hero();

    expect($hero->heroClasses())->toContain('bg-body-light');
});

test('hero component generates bg-image class when image is set', function () {
    $hero = new Hero(image: 'path/to/image.jpg');

    expect($hero->heroClasses())->toContain('bg-image')
        ->not->toContain('bg-body-light');
});

test('hero component generates default content classes', function () {
    $hero = new Hero();

    expect($hero->contentClasses())->toContain('content')
        ->toContain('content-full')
        ->toContain('py-5');
});

test('hero component generates small size classes', function () {
    $hero = new Hero(size: 'sm');

    expect($hero->contentClasses())->toContain('py-4')
        ->not->toContain('py-5');
});

test('hero component generates large size classes', function () {
    $hero = new Hero(size: 'lg');

    expect($hero->contentClasses())->toContain('py-7')
        ->not->toContain('py-5');
});

test('hero component generates overlay classes', function () {
    $hero = new Hero(overlay: 'primary');

    expect($hero->overlayClasses())->toContain('bg-primary')
        ->toContain('bg-black-50');
});

test('hero component generates dark overlay classes', function () {
    $hero = new Hero(overlay: 'dark', dark: true);

    expect($hero->overlayClasses())->toContain('bg-dark')
        ->not->toContain('bg-black-50');
});

test('hero component returns empty overlay classes when no overlay', function () {
    $hero = new Hero();

    expect($hero->overlayClasses())->toBe('');
});

test('hero component renders correct view', function () {
    $hero = new Hero();

    expect($hero->render()->name())->toBe('oneui::components.hero');
});
