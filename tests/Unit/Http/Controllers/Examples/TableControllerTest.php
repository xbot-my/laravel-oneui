<?php

use XBot\OneUI\Http\Controllers\Examples\TableController;

beforeEach(function () {
    $this->controller = new TableController();
});

test('table controller returns correct view', function () {
    $response = $this->controller->__invoke();

    expect($response)->toBeInstanceOf(\Illuminate\View\View::class);
    expect($response->name())->toBe('oneui::examples.tables');
});
