<?php

use XBot\OneUI\View\Components\Offcanvas;

test('offcanvas component initializes with required id', function () {
    $offcanvas = new Offcanvas(id: 'my-offcanvas');

    expect($offcanvas->id)->toBe('my-offcanvas')
        ->and($offcanvas->title)->toBeNull()
        ->and($offcanvas->position)->toBe('end')
        ->and($offcanvas->backdrop)->toBeTrue()
        ->and($offcanvas->scroll)->toBeFalse()
        ->and($offcanvas->keyboard)->toBeTrue();
});

test('offcanvas component generates default classes', function () {
    $offcanvas = new Offcanvas(id: 'test');

    expect($offcanvas->offcanvasClasses())->toContain('offcanvas')
        ->toContain('bg-body-extra-light')
        ->toContain('offcanvas-end');
});

test('offcanvas component generates start position classes', function () {
    $offcanvas = new Offcanvas(id: 'test', position: 'start');

    expect($offcanvas->offcanvasClasses())->toContain('offcanvas-start');
});

test('offcanvas component generates left position classes (alias)', function () {
    $offcanvas = new Offcanvas(id: 'test', position: 'left');

    expect($offcanvas->offcanvasClasses())->toContain('offcanvas-start');
});

test('offcanvas component generates top position classes', function () {
    $offcanvas = new Offcanvas(id: 'test', position: 'top');

    expect($offcanvas->offcanvasClasses())->toContain('offcanvas-top');
});

test('offcanvas component generates bottom position classes', function () {
    $offcanvas = new Offcanvas(id: 'test', position: 'bottom');

    expect($offcanvas->offcanvasClasses())->toContain('offcanvas-bottom');
});

test('offcanvas component generates scroll data attribute', function () {
    $offcanvas = new Offcanvas(id: 'test', scroll: true);

    expect($offcanvas->dataAttributes())->toContain('data-bs-scroll="true"');
});

test('offcanvas component generates no backdrop data attribute', function () {
    $offcanvas = new Offcanvas(id: 'test', backdrop: false);

    expect($offcanvas->dataAttributes())->toContain('data-bs-backdrop="false"');
});

test('offcanvas component generates no keyboard data attribute', function () {
    $offcanvas = new Offcanvas(id: 'test', keyboard: false);

    expect($offcanvas->dataAttributes())->toContain('data-bs-keyboard="false"');
});

test('offcanvas component renders correct view', function () {
    $offcanvas = new Offcanvas(id: 'test');

    expect($offcanvas->render()->name())->toBe('oneui::components.offcanvas');
});
