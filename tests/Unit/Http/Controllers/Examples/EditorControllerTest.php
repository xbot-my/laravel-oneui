<?php

use XBot\OneUI\Http\Controllers\Examples\EditorController;

beforeEach(function () {
    $this->controller = new EditorController();
});

test('editor controller returns correct view', function () {
    $response = $this->controller->__invoke();

    expect($response)->toBeInstanceOf(\Illuminate\View\View::class);
    expect($response->name())->toBe('oneui::examples.editors');
});
