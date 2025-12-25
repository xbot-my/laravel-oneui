<?php

use XBot\OneUI\View\Components\Modal;

test('modal component initializes with required id', function () {
    $modal = new Modal(id: 'my-modal');

    expect($modal->id)->toBe('my-modal')
        ->and($modal->title)->toBeNull()
        ->and($modal->size)->toBe('')
        ->and($modal->centered)->toBeFalse();
});

test('modal component handles title', function () {
    $modal = new Modal(id: 'test', title: 'Modal Title');

    expect($modal->title)->toBe('Modal Title');
});

test('modal component handles size', function () {
    $modal = new Modal(id: 'test', size: 'lg');

    expect($modal->size)->toBe('lg');
});

test('modal component handles centered mode', function () {
    $modal = new Modal(id: 'test', centered: true);

    expect($modal->centered)->toBeTrue();
});

test('modal component handles scrollable mode', function () {
    $modal = new Modal(id: 'test', scrollable: true);

    expect($modal->scrollable)->toBeTrue();
});

test('modal component handles static backdrop', function () {
    $modal = new Modal(id: 'test', static: true);

    expect($modal->static)->toBeTrue();
});

test('modal component generates default dialog classes', function () {
    $modal = new Modal(id: 'test');

    expect($modal->modalDialogClasses())->toBe('modal-dialog');
});

test('modal component generates size dialog classes', function () {
    $modal = new Modal(id: 'test', size: 'lg');

    expect($modal->modalDialogClasses())->toContain('modal-lg');
});

test('modal component generates centered dialog classes', function () {
    $modal = new Modal(id: 'test', centered: true);

    expect($modal->modalDialogClasses())->toContain('modal-dialog-centered');
});

test('modal component generates scrollable dialog classes', function () {
    $modal = new Modal(id: 'test', scrollable: true);

    expect($modal->modalDialogClasses())->toContain('modal-dialog-scrollable');
});

test('modal component renders correct view', function () {
    $modal = new Modal(id: 'test');

    expect($modal->render()->name())->toBe('oneui::components.modal');
});
