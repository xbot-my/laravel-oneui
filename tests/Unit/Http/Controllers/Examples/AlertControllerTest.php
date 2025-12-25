<?php

use XBot\OneUI\Http\Controllers\Examples\AlertController;

beforeEach(function () {
    $this->controller = new AlertController();
});

test('alert controller returns correct view', function () {
    $response = $this->controller->__invoke();

    expect($response)->toBeInstanceOf(\Illuminate\View\View::class);
    expect($response->name())->toBe('oneui::examples.alerts');
});
