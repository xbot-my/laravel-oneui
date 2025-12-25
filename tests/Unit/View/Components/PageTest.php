<?php

use XBot\OneUI\View\Components\Page;

test('page component initializes with default values', function () {
    $page = new Page();

    expect($page->title)->toBe('')
        ->and($page->sidebarDark)->toBeTrue()
        ->and($page->sidebarOpen)->toBeTrue()
        ->and($page->headerFixed)->toBeTrue()
        ->and($page->contentWidth)->toBe('narrow');
});

test('page component generates correct container classes with defaults', function () {
    $page = new Page();

    expect($page->containerClasses())->toContain('sidebar-o')
        ->toContain('sidebar-dark')
        ->toContain('page-header-fixed')
        ->toContain('main-content-narrow')
        ->toContain('enable-page-overlay')
        ->toContain('side-scroll');
});

test('page component generates correct classes when sidebar is light', function () {
    $page = new Page(sidebarDark: false);

    expect($page->containerClasses())->not->toContain('sidebar-dark');
});

test('page component generates correct classes when sidebar is closed', function () {
    $page = new Page(sidebarOpen: false);

    expect($page->containerClasses())->not->toContain('sidebar-o');
});

test('page component generates correct classes for boxed content', function () {
    $page = new Page(contentWidth: 'boxed');

    expect($page->containerClasses())->toContain('main-content-boxed')
        ->not->toContain('main-content-narrow');
});

test('page component generates correct classes for full content', function () {
    $page = new Page(contentWidth: 'full');

    expect($page->containerClasses())->not->toContain('main-content-boxed')
        ->not->toContain('main-content-narrow');
});

test('page component renders correct view', function () {
    $page = new Page();

    expect($page->render()->name())->toBe('oneui::components.page');
});
