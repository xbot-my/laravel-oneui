<?php

use XBot\OneUI\Http\Controllers\Examples\MetricController;

beforeEach(function () {
    $this->controller = new MetricController();
});

test('metric controller returns correct view', function () {
    $response = $this->controller->__invoke();

    expect($response)->toBeInstanceOf(\Illuminate\View\View::class);
    expect($response->name())->toBe('oneui::examples.metrics');
});
