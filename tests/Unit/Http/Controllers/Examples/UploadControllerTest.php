<?php

use XBot\OneUI\Http\Controllers\Examples\UploadController;

beforeEach(function () {
    $this->controller = new UploadController();
});

test('upload controller returns correct view', function () {
    $response = $this->controller->__invoke();

    expect($response)->toBeInstanceOf(\Illuminate\View\View::class);
    expect($response->name())->toBe('oneui::examples.upload');
});
