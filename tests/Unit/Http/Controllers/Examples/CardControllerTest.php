<?php

use XBot\OneUI\Http\Controllers\Examples\CardController;

beforeEach(function () {
    $this->controller = new CardController();
});

test('card controller returns correct view', function () {
    $response = $this->controller->__invoke();

    expect($response)->toBeInstanceOf(\Illuminate\View\View::class);
    expect($response->name())->toBe('oneui::examples.cards');
});
