<?php

use XBot\OneUI\Http\Controllers\Examples\ChartController;

beforeEach(function () {
    $this->controller = new ChartController();
});

test('chart controller returns correct view', function () {
    $response = $this->controller->__invoke();

    expect($response)->toBeInstanceOf(\Illuminate\View\View::class);
    expect($response->name())->toBe('oneui::examples.charts');
});
