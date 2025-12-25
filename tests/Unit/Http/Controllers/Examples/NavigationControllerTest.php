<?php

use XBot\OneUI\Http\Controllers\Examples\NavigationController;

beforeEach(function () {
    $this->controller = new NavigationController();
});

test('navigation controller returns correct view', function () {
    $response = $this->controller->__invoke();

    expect($response)->toBeInstanceOf(\Illuminate\View\View::class);
    expect($response->name())->toBe('oneui::examples.navigation');
});
