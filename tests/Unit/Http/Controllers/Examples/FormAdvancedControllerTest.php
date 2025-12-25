<?php

use XBot\OneUI\Http\Controllers\Examples\FormAdvancedController;

beforeEach(function () {
    $this->controller = new FormAdvancedController();
});

test('form advanced controller returns correct view', function () {
    $response = $this->controller->__invoke();

    expect($response)->toBeInstanceOf(\Illuminate\View\View::class);
    expect($response->name())->toBe('oneui::examples.forms-advanced');
});
