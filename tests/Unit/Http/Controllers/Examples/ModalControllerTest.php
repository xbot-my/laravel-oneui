<?php

use XBot\OneUI\Http\Controllers\Examples\ModalController;

beforeEach(function () {
    $this->controller = new ModalController();
});

test('modal controller returns correct view', function () {
    $response = $this->controller->__invoke();

    expect($response)->toBeInstanceOf(\Illuminate\View\View::class);
    expect($response->name())->toBe('oneui::examples.modals');
});
