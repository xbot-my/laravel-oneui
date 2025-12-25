<?php

use XBot\OneUI\View\Components\Accordion;

test('accordion component initializes with default values', function () {
    $accordion = new Accordion();

    expect($accordion->id)->toBe('accordion')
        ->and($accordion->items)->toBeEmpty()
        ->and($accordion->flush)->toBeFalse()
        ->and($accordion->open)->toBe(0);
});

test('accordion component handles custom id', function () {
    $accordion = new Accordion(id: 'faq');

    expect($accordion->id)->toBe('faq');
});

test('accordion component handles items array', function () {
    $items = [
        ['title' => 'Q1', 'content' => 'A1'],
        ['title' => 'Q2', 'content' => 'A2'],
    ];
    $accordion = new Accordion(items: $items);

    expect($accordion->items)->toBe($items);
});

test('accordion component handles flush mode', function () {
    $accordion = new Accordion(flush: true);

    expect($accordion->flush)->toBeTrue();
});

test('accordion component handles open index', function () {
    $accordion = new Accordion(open: 1);

    expect($accordion->open)->toBe(1);
});

test('accordion component generates default classes', function () {
    $accordion = new Accordion();

    expect($accordion->accordionClasses())->toBe('accordion');
});

test('accordion component generates flush classes', function () {
    $accordion = new Accordion(flush: true);

    expect($accordion->accordionClasses())->toContain('accordion-flush');
});

test('accordion component renders correct view', function () {
    $accordion = new Accordion();

    expect($accordion->render()->name())->toBe('oneui::components.accordion');
});
