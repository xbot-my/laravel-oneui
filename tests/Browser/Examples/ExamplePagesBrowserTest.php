<?php

declare(strict_types=1);

namespace XBot\OneUI\Tests\Browser\Examples;

use XBot\OneUI\Tests\Browser\BaseBrowserTest;

uses(BaseBrowserTest::class);

// ==================== Group 1: Basic Layout ====================

test('index page loads without errors', function () {
    echo "\n[INFO] Testing index page...\n";

    browser()->visit(route('oneui.examples.index'))
        ->assertStatus(200)
        ->assertNoSmoke()
        ->assertVisible('aside') // sidebar
        ->assertVisible('.content'); // main content

    echo "[SUCCESS] Index page loaded successfully\n";
});

test('layout page renders core components', function () {
    echo "\n[INFO] Testing layout page...\n";

    browser()->visit(route('oneui.examples.layout'))
        ->assertStatus(200)
        ->assertNoSmoke()
        ->assertSee('Hero Section')
        ->assertSee('Block');

    echo "[SUCCESS] Layout page loaded successfully\n";
});

test('navigation page displays all navigation components', function () {
    echo "\n[INFO] Testing navigation page...\n";

    browser()->visit(route('oneui.examples.navigation'))
        ->assertStatus(200)
        ->assertNoSmoke()
        ->assertSee('Breadcrumb')
        ->assertSee('Nav Tabs')
        ->assertSee('Sidebar Menu');

    echo "[SUCCESS] Navigation page loaded successfully\n";
});

// ==================== Group 2: Form Components ====================

test('forms page renders form inputs', function () {
    echo "\n[INFO] Testing forms page...\n";

    browser()->visit(route('oneui.examples.forms'))
        ->assertStatus(200)
        ->assertNoSmoke()
        ->assertSee('Form Components')
        ->assertVisible('button[type="submit"]')
        ->assertVisible('input[type="text"]')
        ->assertVisible('select');

    echo "[SUCCESS] Forms page loaded successfully\n";
});

test('forms-advanced page renders complex inputs', function () {
    echo "\n[INFO] Testing forms-advanced page...\n";

    browser()->visit(route('oneui.examples.forms-advanced'))
        ->assertStatus(200)
        ->assertNoSmoke()
        ->assertSee('Advanced Form Components')
        ->assertSee('Range Sliders')
        ->assertSee('Ratings');

    echo "[SUCCESS] Forms-advanced page loaded successfully\n";
});

// ==================== Group 3: Data Display ====================

test('tables page displays tables and badges', function () {
    echo "\n[INFO] Testing tables page...\n";

    browser()->visit(route('oneui.examples.tables'))
        ->assertStatus(200)
        ->assertNoSmoke()
        ->assertSee('Table')
        ->assertVisible('table');

    echo "[SUCCESS] Tables page loaded successfully\n";
});

test('charts page renders chart components', function () {
    echo "\n[INFO] Testing charts page...\n";

    browser()->visit(route('oneui.examples.charts'))
        ->assertStatus(200)
        ->assertNoSmoke()
        ->assertSee('Charts')
        ->assertSee('ChartJS');

    echo "[SUCCESS] Charts page loaded successfully\n";
});

test('metrics page shows stat widgets', function () {
    echo "\n[INFO] Testing metrics page...\n";

    browser()->visit(route('oneui.examples.metrics'))
        ->assertStatus(200)
        ->assertNoSmoke()
        ->assertSee('Metrics');

    echo "[SUCCESS] Metrics page loaded successfully\n";
});

test('lists page displays list components', function () {
    echo "\n[INFO] Testing lists page...\n";

    browser()->visit(route('oneui.examples.lists'))
        ->assertStatus(200)
        ->assertNoSmoke()
        ->assertSee('Lists');

    echo "[SUCCESS] Lists page loaded successfully\n";
});

test('cards page renders card variants', function () {
    echo "\n[INFO] Testing cards page...\n";

    browser()->visit(route('oneui.examples.cards'))
        ->assertStatus(200)
        ->assertNoSmoke()
        ->assertSee('Cards')
        ->assertSee('User Card');

    echo "[SUCCESS] Cards page loaded successfully\n";
});

// ==================== Group 4: Advanced Interactive ====================

test('calendar page loads fullcalendar', function () {
    echo "\n[INFO] Testing calendar page...\n";

    browser()->visit(route('oneui.examples.calendar'))
        ->assertStatus(200)
        ->assertNoSmoke()
        ->assertSee('Calendar');

    echo "[SUCCESS] Calendar page loaded successfully\n";
});

test('editors page loads text editors', function () {
    echo "\n[INFO] Testing editors page...\n";

    browser()->visit(route('oneui.examples.editors'))
        ->assertStatus(200)
        ->assertNoSmoke()
        ->assertSee('Editors');

    echo "[SUCCESS] Editors page loaded successfully\n";
});

test('upload page renders file upload components', function () {
    echo "\n[INFO] Testing upload page...\n";

    browser()->visit(route('oneui.examples.upload'))
        ->assertStatus(200)
        ->assertNoSmoke()
        ->assertSee('Upload')
        ->assertVisible('input[type="file"]');

    echo "[SUCCESS] Upload page loaded successfully\n";
});

test('modals page displays modal components', function () {
    echo "\n[INFO] Testing modals page...\n";

    browser()->visit(route('oneui.examples.modals'))
        ->assertStatus(200)
        ->assertNoSmoke()
        ->assertSee('Modals')
        ->assertSee('Dropdowns');

    echo "[SUCCESS] Modals page loaded successfully\n";
});

// ==================== Group 5: Feedback & Media ====================

test('alerts page shows all alert types', function () {
    echo "\n[INFO] Testing alerts page...\n";

    browser()->visit(route('oneui.examples.alerts'))
        ->assertStatus(200)
        ->assertNoSmoke()
        ->assertSee('Alerts');

    echo "[SUCCESS] Alerts page loaded successfully\n";
});

test('notifications page renders feedback components', function () {
    echo "\n[INFO] Testing notifications page...\n";

    browser()->visit(route('oneui.examples.notifications'))
        ->assertStatus(200)
        ->assertNoSmoke()
        ->assertSee('Notifications');

    echo "[SUCCESS] Notifications page loaded successfully\n";
});

test('media page displays media components', function () {
    echo "\n[INFO] Testing media page...\n";

    browser()->visit(route('oneui.examples.media'))
        ->assertStatus(200)
        ->assertNoSmoke()
        ->assertSee('Media');

    echo "[SUCCESS] Media page loaded successfully\n";
});

test('utilities page shows helper components', function () {
    echo "\n[INFO] Testing utilities page...\n";

    browser()->visit(route('oneui.examples.utilities'))
        ->assertStatus(200)
        ->assertNoSmoke()
        ->assertSee('Utilities');

    echo "[SUCCESS] Utilities page loaded successfully\n";
});

// ==================== Comprehensive Test ====================

test('all example pages have consistent layout structure', function () {
    echo "\n[INFO] Testing consistent layout across all pages...\n";

    $routes = [
        'oneui.examples.index',
        'oneui.examples.layout',
        'oneui.examples.forms',
        'oneui.examples.forms-advanced',
        'oneui.examples.tables',
        'oneui.examples.charts',
        'oneui.examples.metrics',
        'oneui.examples.lists',
        'oneui.examples.cards',
        'oneui.examples.calendar',
        'oneui.examples.editors',
        'oneui.examples.upload',
        'oneui.examples.navigation',
        'oneui.examples.notifications',
        'oneui.examples.media',
        'oneui.examples.utilities',
        'oneui.examples.alerts',
        'oneui.examples.modals',
    ];

    foreach ($routes as $route) {
        echo "\n  Checking {$route}...";

        browser()->visit(route($route))
            ->assertStatus(200)
            ->assertVisible('aside') // sidebar exists
            ->assertVisible('.content'); // main content exists

        echo " OK";
    }

    echo "\n[SUCCESS] All 18 pages have consistent layout\n";
});
