<?php

declare(strict_types=1);

// Base URL for example pages
$baseUrl = 'http://127.0.0.1:8000/oneui/examples';

// ==================== Group 1: Basic Layout ====================

test('index page loads without errors', function () use ($baseUrl) {
    echo "\n[INFO] Testing index page...\n";

    browser()->visit("{$baseUrl}/")
        ->assertStatus(200)
        ->assertNoSmoke()
        ->assertVisible('aside')
        ->assertVisible('.content');

    echo "[SUCCESS] Index page loaded\n";
});

test('layout page renders core components', function () use ($baseUrl) {
    echo "\n[INFO] Testing layout page...\n";

    browser()->visit("{$baseUrl}/layout")
        ->assertStatus(200)
        ->assertNoSmoke()
        ->assertSee('Hero Section')
        ->assertSee('Block');

    echo "[SUCCESS] Layout page loaded\n";
});

test('navigation page displays navigation components', function () use ($baseUrl) {
    echo "\n[INFO] Testing navigation page...\n";

    browser()->visit("{$baseUrl}/navigation")
        ->assertStatus(200)
        ->assertNoSmoke()
        ->assertSee('Breadcrumb')
        ->assertSee('Nav Tabs');

    echo "[SUCCESS] Navigation page loaded\n";
});

// ==================== Group 2: Form Components ====================

test('forms page renders form inputs', function () use ($baseUrl) {
    echo "\n[INFO] Testing forms page...\n";

    browser()->visit("{$baseUrl}/forms")
        ->assertStatus(200)
        ->assertNoSmoke()
        ->assertSee('Form Components')
        ->assertVisible('button[type="submit"]');

    echo "[SUCCESS] Forms page loaded\n";
});

test('forms-advanced page renders advanced inputs', function () use ($baseUrl) {
    echo "\n[INFO] Testing forms-advanced page...\n";

    browser()->visit("{$baseUrl}/forms-advanced")
        ->assertStatus(200)
        ->assertNoSmoke()
        ->assertSee('Advanced Form Components')
        ->assertSee('Range Sliders');

    echo "[SUCCESS] Forms-advanced page loaded\n";
});

// ==================== Group 3: Data Display ====================

test('tables page displays tables', function () use ($baseUrl) {
    echo "\n[INFO] Testing tables page...\n";

    browser()->visit("{$baseUrl}/tables")
        ->assertStatus(200)
        ->assertNoSmoke()
        ->assertSee('Table')
        ->assertVisible('table');

    echo "[SUCCESS] Tables page loaded\n";
});

test('charts page renders chart components', function () use ($baseUrl) {
    echo "\n[INFO] Testing charts page...\n";

    browser()->visit("{$baseUrl}/charts")
        ->assertStatus(200)
        ->assertNoSmoke()
        ->assertSee('Charts')
        ->assertSee('ChartJS');

    echo "[SUCCESS] Charts page loaded\n";
});

test('metrics page shows stat widgets', function () use ($baseUrl) {
    echo "\n[INFO] Testing metrics page...\n";

    browser()->visit("{$baseUrl}/metrics")
        ->assertStatus(200)
        ->assertNoSmoke()
        ->assertSee('Metrics');

    echo "[SUCCESS] Metrics page loaded\n";
});

test('lists page displays list components', function () use ($baseUrl) {
    echo "\n[INFO] Testing lists page...\n";

    browser()->visit("{$baseUrl}/lists")
        ->assertStatus(200)
        ->assertNoSmoke()
        ->assertSee('Lists');

    echo "[SUCCESS] Lists page loaded\n";
});

test('cards page renders card variants', function () use ($baseUrl) {
    echo "\n[INFO] Testing cards page...\n";

    browser()->visit("{$baseUrl}/cards")
        ->assertStatus(200)
        ->assertNoSmoke()
        ->assertSee('Cards')
        ->assertSee('User Card');

    echo "[SUCCESS] Cards page loaded\n";
});

// ==================== Group 4: Advanced Interactive ====================

test('calendar page loads calendar', function () use ($baseUrl) {
    echo "\n[INFO] Testing calendar page...\n";

    browser()->visit("{$baseUrl}/calendar")
        ->assertStatus(200)
        ->assertNoSmoke()
        ->assertSee('Calendar');

    echo "[SUCCESS] Calendar page loaded\n";
});

test('editors page loads text editors', function () use ($baseUrl) {
    echo "\n[INFO] Testing editors page...\n";

    browser()->visit("{$baseUrl}/editors")
        ->assertStatus(200)
        ->assertNoSmoke()
        ->assertSee('Editors');

    echo "[SUCCESS] Editors page loaded\n";
});

test('upload page renders file upload components', function () use ($baseUrl) {
    echo "\n[INFO] Testing upload page...\n";

    browser()->visit("{$baseUrl}/upload")
        ->assertStatus(200)
        ->assertNoSmoke()
        ->assertSee('Upload')
        ->assertVisible('input[type="file"]');

    echo "[SUCCESS] Upload page loaded\n";
});

test('modals page displays modal components', function () use ($baseUrl) {
    echo "\n[INFO] Testing modals page...\n";

    browser()->visit("{$baseUrl}/modals")
        ->assertStatus(200)
        ->assertNoSmoke()
        ->assertSee('Modals')
        ->assertSee('Dropdowns');

    echo "[SUCCESS] Modals page loaded\n";
});

// ==================== Group 5: Feedback & Media ====================

test('alerts page shows alert types', function () use ($baseUrl) {
    echo "\n[INFO] Testing alerts page...\n";

    browser()->visit("{$baseUrl}/alerts")
        ->assertStatus(200)
        ->assertNoSmoke()
        ->assertSee('Alerts');

    echo "[SUCCESS] Alerts page loaded\n";
});

test('notifications page renders feedback components', function () use ($baseUrl) {
    echo "\n[INFO] Testing notifications page...\n";

    browser()->visit("{$baseUrl}/notifications")
        ->assertStatus(200)
        ->assertNoSmoke()
        ->assertSee('Notifications');

    echo "[SUCCESS] Notifications page loaded\n";
});

test('media page displays media components', function () use ($baseUrl) {
    echo "\n[INFO] Testing media page...\n";

    browser()->visit("{$baseUrl}/media")
        ->assertStatus(200)
        ->assertNoSmoke()
        ->assertSee('Media');

    echo "[SUCCESS] Media page loaded\n";
});

test('utilities page shows helper components', function () use ($baseUrl) {
    echo "\n[INFO] Testing utilities page...\n";

    browser()->visit("{$baseUrl}/utilities")
        ->assertStatus(200)
        ->assertNoSmoke()
        ->assertSee('Utilities');

    echo "[SUCCESS] Utilities page loaded\n";
});

// ==================== Comprehensive Test ====================

test('all example pages have consistent layout', function () use ($baseUrl) {
    echo "\n[INFO] Testing all pages for layout consistency...\n";

    $pages = [
        '',
        'layout',
        'forms',
        'forms-advanced',
        'tables',
        'charts',
        'metrics',
        'lists',
        'cards',
        'calendar',
        'editors',
        'upload',
        'navigation',
        'notifications',
        'media',
        'utilities',
        'alerts',
        'modals',
    ];

    foreach ($pages as $page) {
        $url = $page === '' ? "{$baseUrl}/" : "{$baseUrl}/{$page}";
        echo "\n  Checking /{$page}...";

        browser()->visit($url)
            ->assertStatus(200)
            ->assertVisible('aside')
            ->assertVisible('.content');

        echo " OK";
    }

    echo "\n[SUCCESS] All 18 pages have consistent layout\n";
});
