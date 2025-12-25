<?php

use XBot\OneUI\View\Components\Block;

test('block component initializes with default values', function () {
    $block = new Block();

    expect($block->title)->toBeNull()
        ->and($block->rounded)->toBeTrue()
        ->and($block->bordered)->toBeFalse()
        ->and($block->themed)->toBeFalse()
        ->and($block->transparent)->toBeFalse();
});

test('block component generates correct classes with defaults', function () {
    $block = new Block();

    expect($block->blockClasses())->toBe('block block-rounded');
});

test('block component generates correct classes when bordered', function () {
    $block = new Block(bordered: true);

    expect($block->blockClasses())->toContain('block-bordered');
});

test('block component generates correct classes when themed', function () {
    $block = new Block(themed: true);

    expect($block->blockClasses())->toContain('block-themed');
});

test('block component generates correct classes when transparent', function () {
    $block = new Block(transparent: true);

    expect($block->blockClasses())->toContain('block-transparent');
});

test('block component generates correct classes when not rounded', function () {
    $block = new Block(rounded: false);

    expect($block->blockClasses())->not->toContain('block-rounded');
});

test('block component generates correct mode classes', function () {
    $loading = new Block(mode: 'loading');
    $hide = new Block(mode: 'hide');

    expect($loading->blockClasses())->toContain('block-mode-loading');
    expect($hide->blockClasses())->toContain('block-mode-hide');
});

test('block component generates default header classes', function () {
    $block = new Block();

    expect($block->headerClasses())->toBe('block-header-default');
});

test('block component generates colored header classes', function () {
    $block = new Block(headerColor: 'primary');

    expect($block->headerClasses())->toContain('bg-primary');
});

test('block component generates shaded header classes', function () {
    $block = new Block(headerColor: 'primary', headerShade: 'dark');

    expect($block->headerClasses())->toContain('bg-primary-dark');
});

test('block component includes custom header classes', function () {
    $block = new Block(headerClass: 'custom-class another-class');

    expect($block->headerClasses())->toContain('custom-class')
        ->toContain('another-class');
});

test('block component renders correct view', function () {
    $block = new Block();

    expect($block->render()->name())->toBe('oneui::components.block');
});
