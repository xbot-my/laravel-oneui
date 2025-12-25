<?php

use XBot\OneUI\View\Components\Timeline;

test('timeline component initializes with default values', function () {
    $timeline = new Timeline();

    expect($timeline->items)->toBeEmpty()
        ->and($timeline->centered)->toBeFalse()
        ->and($timeline->alt)->toBeFalse();
});

test('timeline component handles items array', function () {
    $items = [
        ['title' => 'Event 1', 'content' => 'Description'],
        ['title' => 'Event 2', 'content' => 'Description'],
    ];
    $timeline = new Timeline(items: $items);

    expect($timeline->items)->toBe($items);
});

test('timeline component handles centered mode', function () {
    $timeline = new Timeline(centered: true);

    expect($timeline->centered)->toBeTrue();
});

test('timeline component handles alt mode', function () {
    $timeline = new Timeline(alt: true);

    expect($timeline->alt)->toBeTrue();
});

test('timeline component generates default classes', function () {
    $timeline = new Timeline();

    expect($timeline->timelineClasses())->toBe('timeline');
});

test('timeline component generates centered classes', function () {
    $timeline = new Timeline(centered: true);

    expect($timeline->timelineClasses())->toContain('timeline-centered');
});

test('timeline component generates alt classes', function () {
    $timeline = new Timeline(alt: true);

    expect($timeline->timelineClasses())->toContain('timeline-alt');
});

test('timeline component renders correct view', function () {
    $timeline = new Timeline();

    expect($timeline->render()->name())->toBe('oneui::components.timeline');
});
