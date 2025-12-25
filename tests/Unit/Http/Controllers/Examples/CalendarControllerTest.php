<?php

use XBot\OneUI\Http\Controllers\Examples\CalendarController;

beforeEach(function () {
    $this->controller = new CalendarController();
});

test('calendar controller returns correct view', function () {
    $response = $this->controller->__invoke();

    expect($response)->toBeInstanceOf(\Illuminate\View\View::class);
    expect($response->name())->toBe('oneui::examples.calendar');
});
