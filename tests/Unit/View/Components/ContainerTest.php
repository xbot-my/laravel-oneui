<?php

use XBot\OneUI\View\Components\Container;

test('container component initializes with default values', function () {
    $container = new Container();

    expect($container->fluid)->toBeFalse()
        ->and($container->breakpoint)->toBeNull();
});

test('container component generates default classes', function () {
    $container = new Container();

    expect($container->containerClasses())->toBe('container');
});

test('container component generates fluid classes', function () {
    $container = new Container(fluid: true);

    expect($container->containerClasses())->toBe('container-fluid');
});

test('container component generates breakpoint classes', function () {
    $container = new Container(breakpoint: 'sm');
    $containerLg = new Container(breakpoint: 'lg');

    expect($container->containerClasses())->toBe('container-sm');
    expect($containerLg->containerClasses())->toBe('container-lg');
});

test('container fluid takes precedence over breakpoint', function () {
    $container = new Container(fluid: true, breakpoint: 'lg');

    expect($container->containerClasses())->toBe('container-fluid');
});

test('container component renders correct view', function () {
    $container = new Container();

    expect($container->render()->name())->toBe('oneui::components.container');
});
