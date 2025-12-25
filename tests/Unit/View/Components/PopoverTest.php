<?php

use XBot\OneUI\View\Components\Popover;

test('popover component initializes with required parameters', function () {
    $popover = new Popover(title: 'Title', content: 'Content');

    expect($popover->title)->toBe('Title')
        ->and($popover->content)->toBe('Content')
        ->and($popover->placement)->toBe('top')
        ->and($popover->trigger)->toBe('hover');
});

test('popover component handles placement', function () {
    $popover = new Popover(title: 'T', content: 'C', placement: 'right');

    expect($popover->placement)->toBe('right');
});

test('popover component handles trigger type', function () {
    $popover = new Popover(title: 'T', content: 'C', trigger: 'click');

    expect($popover->trigger)->toBe('click');
});

test('popover component handles html content', function () {
    $popover = new Popover(title: 'T', content: 'C', html: true);

    expect($popover->html)->toBeTrue();
});

test('popover component handles animation', function () {
    $popover = new Popover(title: 'T', content: 'C', animation: false);

    expect($popover->animation)->toBeFalse();
});

test('popover component handles delay', function () {
    $popover = new Popover(title: 'T', content: 'C', delay: '100');

    expect($popover->delay)->toBe('100');
});

test('popover component generates attributes correctly', function () {
    $popover = new Popover(
        title: 'Test Title',
        content: 'Test Content',
        placement: 'bottom',
        trigger: 'click'
    );

    $attrs = $popover->popoverAttributes();
    expect($attrs)->toContain('data-bs-toggle="popover"')
        ->toContain('data-bs-placement="bottom"')
        ->toContain('data-bs-trigger="click"')
        ->toContain('data-bs-content="Test Content"')
        ->toContain('title="Test Title"');
});

test('popover component generates html attribute', function () {
    $popover = new Popover(title: 'T', content: 'C', html: true);

    expect($popover->popoverAttributes())->toContain('data-bs-html="true"');
});

test('popover component generates delay attribute', function () {
    $popover = new Popover(title: 'T', content: 'C', delay: '200');

    expect($popover->popoverAttributes())->toContain('data-bs-delay="200"');
});

test('popover component renders correct view', function () {
    $popover = new Popover(title: 'T', content: 'C');

    expect($popover->render()->name())->toBe('oneui::components.popover');
});
