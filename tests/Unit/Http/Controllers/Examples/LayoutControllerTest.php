<?php

use XBot\OneUI\Http\Controllers\Examples\LayoutController;

beforeEach(function () {
    $this->controller = new LayoutController();
});

test('layout controller returns correct view', function () {
    $response = $this->controller->__invoke();

    expect($response)->toBeInstanceOf(\Illuminate\View\View::class);
    expect($response->name())->toBe('oneui::examples.layout');
});
