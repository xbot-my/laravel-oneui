<?php

test('button page loads', function () {
    browser()->visit('/test/components/button')
        ->assertSee('Button Component Test')
        ->assertVisible('#btn-default')
        ->assertVisible('#btn-primary')
        ->assertVisible('#btn-outline')
        ->assertNoSmoke();

    echo "\n[SCREENSHOT] Test completed successfully\n";
});
