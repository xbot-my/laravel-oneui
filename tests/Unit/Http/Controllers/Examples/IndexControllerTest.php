<?php

use XBot\OneUI\Http\Controllers\Examples\IndexController;

beforeEach(function () {
    $this->controller = new IndexController();
});

test('index controller returns correct view', function () {
    $response = $this->controller->__invoke();

    expect($response)->toBeInstanceOf(\Illuminate\View\View::class);
    expect($response->name())->toBe('oneui::examples.index');
});
