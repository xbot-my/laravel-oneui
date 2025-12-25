<?php

use XBot\OneUI\Http\Controllers\Examples\UtilityController;

beforeEach(function () {
    $this->controller = new UtilityController();
});

test('utility controller returns correct view', function () {
    $response = $this->controller->__invoke();

    expect($response)->toBeInstanceOf(\Illuminate\View\View::class);
    expect($response->name())->toBe('oneui::examples.utilities');
});
