<?php

use XBot\OneUI\Http\Controllers\Examples\NotificationController;

beforeEach(function () {
    $this->controller = new NotificationController();
});

test('notification controller returns correct view', function () {
    $response = $this->controller->__invoke();

    expect($response)->toBeInstanceOf(\Illuminate\View\View::class);
    expect($response->name())->toBe('oneui::examples.notifications');
});
