<?php

use XBot\OneUI\Http\Controllers\Examples\MediaController;

beforeEach(function () {
    $this->controller = new MediaController();
});

test('media controller returns correct view', function () {
    $response = $this->controller->__invoke();

    expect($response)->toBeInstanceOf(\Illuminate\View\View::class);
    expect($response->name())->toBe('oneui::examples.media');
});
