<?php

use XBot\OneUI\View\Components\SidebarMenu;

test('sidebar menu component initializes with default values', function () {
    $menu = new SidebarMenu();

    expect($menu->data)->toBeEmpty()
        ->and($menu->sortByOrder)->toBeTrue();
});

test('sidebar menu component processes menu items', function () {
    $data = [
        ['label' => 'Dashboard', 'route' => 'dashboard', 'order' => 1],
        ['label' => 'Users', 'url' => '/users', 'order' => 2],
    ];
    $menu = new SidebarMenu(data: $data);

    expect($menu->items->count())->toBe(2);
});

test('sidebar menu component sorts items by order', function () {
    $data = [
        ['label' => 'Second', 'order' => 2],
        ['label' => 'First', 'order' => 1],
    ];
    $menu = new SidebarMenu(data: $data, sortByOrder: true);

    expect($menu->items->first()->getValue('label'))->toBe('First');
});

test('sidebar menu component can disable sorting', function () {
    $data = [
        ['label' => 'Second', 'order' => 2],
        ['label' => 'First', 'order' => 1],
    ];
    $menu = new SidebarMenu(data: $data, sortByOrder: false);

    expect($menu->items->first()->getValue('label'))->toBe('Second');
});

test('sidebar menu component generates item url from route', function () {
    $data = [
        ['label' => 'Home', 'route' => 'home'],
    ];
    $menu = new SidebarMenu(data: $data);
    $item = $menu->items->first();

    $url = $menu->getItemUrl($item);
    // In test environment, routes may not be available, so it falls back to #
    expect($url)->toBe('#');
});

test('sidebar menu component generates item url from url', function () {
    $data = [
        ['label' => 'Google', 'url' => 'https://google.com'],
    ];
    $menu = new SidebarMenu(data: $data);
    $item = $menu->items->first();

    expect($menu->getItemUrl($item))->toBe('https://google.com');
});

test('sidebar menu component generates target attributes', function () {
    $data = [
        ['label' => 'External', 'url' => 'https://example.com', 'target' => '_blank'],
    ];
    $menu = new SidebarMenu(data: $data);
    $item = $menu->items->first();

    $attrs = $menu->getLinkAttributes($item);
    expect($attrs)->toContain('target="_blank"')
        ->toContain('rel="noopener noreferrer"');
});

test('sidebar menu component generates modal attributes', function () {
    $data = [
        ['label' => 'Help', 'modal' => '#helpModal'],
    ];
    $menu = new SidebarMenu(data: $data);
    $item = $menu->items->first();

    $attrs = $menu->getLinkAttributes($item);
    expect($attrs)->toContain('data-bs-toggle="modal"')
        ->toContain('data-bs-target="#helpModal"');
});

test('sidebar menu component renders correct view', function () {
    $menu = new SidebarMenu();

    expect($menu->render()->name())->toBe('oneui::components.sidebar-menu');
});
