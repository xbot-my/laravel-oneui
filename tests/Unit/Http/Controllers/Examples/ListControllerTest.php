<?php

use XBot\OneUI\Http\Controllers\Examples\ListController;

beforeEach(function () {
    $this->controller = new ListController();
});

test('list controller returns correct view', function () {
    $response = $this->controller->__invoke();

    expect($response)->toBeInstanceOf(\Illuminate\View\View::class);
    expect($response->name())->toBe('oneui::examples.lists');
});
