<?php

declare(strict_types=1);

namespace XBot\OneUI\Tests\Browser;

class ExamplePagesTest extends ExamplePagesTestCase
{
    // ==================== Group 1: Basic Layout ====================

    public function test_index_page_loads(): void
    {
        $this->visit('/oneui/examples/');
        $this->assertResponseStatus(200);
        $this->see('OneUI');
        $this->see('Component Library');
    }

    public function test_layout_page_renders(): void
    {
        $this->visit('/oneui/examples/layout');
        $this->assertResponseStatus(200);
        $this->see('Layout');
        $this->see('Hero Section');
        $this->see('Block');
    }

    public function test_navigation_page_displays(): void
    {
        $this->visit('/oneui/examples/navigation');
        $this->assertResponseStatus(200);
        $this->see('Navigation');
        $this->see('Breadcrumb');
        $this->see('Nav Tabs');
    }

    // ==================== Group 2: Form Components ====================

    public function test_forms_page_renders(): void
    {
        $this->visit('/oneui/examples/forms');
        $this->assertResponseStatus(200);
        $this->see('Forms');
        $this->see('Form Components');
    }

    public function test_forms_advanced_page_renders(): void
    {
        $this->visit('/oneui/examples/forms-advanced');
        $this->assertResponseStatus(200);
        $this->see('Advanced Forms');
        $this->see('Range Sliders');
    }

    // ==================== Group 3: Data Display ====================

    public function test_tables_page_displays(): void
    {
        $this->visit('/oneui/examples/tables');
        $this->assertResponseStatus(200);
        $this->see('Tables');
        $this->see('Table');
    }

    public function test_charts_page_renders(): void
    {
        if ($this->isCI() && $this->isJsOnlyPage('charts')) {
            $this->markTestSkipped('ChartJS component requires JavaScript - skipped in CI');
        }

        $this->visit('/oneui/examples/charts');
        $this->assertResponseStatus(200);
        $this->see('Charts');
        $this->see('ChartJS');
    }

    public function test_metrics_page_shows(): void
    {
        $this->visit('/oneui/examples/metrics');
        $this->assertResponseStatus(200);
        $this->see('Metrics');
        $this->see('Total Users');
    }

    public function test_lists_page_displays(): void
    {
        $this->visit('/oneui/examples/lists');
        $this->assertResponseStatus(200);
        $this->see('Lists');
        $this->see('Data List');
    }

    public function test_cards_page_renders(): void
    {
        $this->visit('/oneui/examples/cards');
        $this->assertResponseStatus(200);
        $this->see('Cards');
        $this->see('User Card');
    }

    // ==================== Group 4: Advanced Interactive ====================

    public function test_calendar_page_loads(): void
    {
        $this->visit('/oneui/examples/calendar');
        $this->assertResponseStatus(200);
        $this->see('Calendar');
        $this->see('FullCalendar');
    }

    public function test_editors_page_loads(): void
    {
        if ($this->isCI() && $this->isJsOnlyPage('editors')) {
            $this->markTestSkipped('Editor components require JavaScript - skipped in CI');
        }

        $this->visit('/oneui/examples/editors');
        $this->assertResponseStatus(200);
        $this->see('Editors');
        $this->see('CKEditor');
    }

    public function test_upload_page_renders(): void
    {
        $this->visit('/oneui/examples/upload');
        $this->assertResponseStatus(200);
        $this->see('Upload');
        $this->see('Dropzone');
    }

    public function test_modals_page_displays(): void
    {
        $this->visit('/oneui/examples/modals');
        $this->assertResponseStatus(200);
        $this->see('Modals');
        $this->see('Modal');
        $this->see('Dropdowns');
    }

    // ==================== Group 5: Feedback & Media ====================

    public function test_alerts_page_shows(): void
    {
        $this->visit('/oneui/examples/alerts');
        $this->assertResponseStatus(200);
        $this->see('Alerts');
        $this->see('Alert');
    }

    public function test_notifications_page_renders(): void
    {
        $this->visit('/oneui/examples/notifications');
        $this->assertResponseStatus(200);
        $this->see('Notifications');
        $this->see('Toast');
    }

    public function test_media_page_displays(): void
    {
        $this->visit('/oneui/examples/media');
        $this->assertResponseStatus(200);
        $this->see('Media');
        $this->see('Image');
    }

    public function test_utilities_page_shows(): void
    {
        $this->visit('/oneui/examples/utilities');
        $this->assertResponseStatus(200);
        $this->see('Utilities');
        $this->see('Icons');
    }
}
