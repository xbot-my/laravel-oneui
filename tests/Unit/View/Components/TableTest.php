<?php

use XBot\OneUI\View\Components\Table;

test('Table component initializes data', function () {
    $data = [
        ['id' => 1, 'name' => 'John', 'email' => 'john@example.com'],
        ['id' => 2, 'name' => 'Jane', 'email' => 'jane@example.com'],
    ];

    $table = new Table(
        data: $data,
        columns: ['id', 'name', 'email']
    );

    expect($table->hasData())->toBeTrue()
        ->and($table->items->count())->toBe(2);
});

test('Table component formats labels', function () {
    $table = new Table(
        data: [],
        columns: ['first_name', 'last_name', 'user-email']
    );

    expect($table->columnConfig['first_name']['label'])->toBe('First Name')
        ->and($table->columnConfig['last_name']['label'])->toBe('Last Name')
        ->and($table->columnConfig['user-email']['label'])->toBe('User Email');
});

test('Table sanitizes HTML to prevent XSS', function () {
    $table = new Table(data: []);

    $malicious = '<script>alert("XSS")</script><p>Safe content</p>';
    $cleaned = $table->sanitizeHtml($malicious);

    expect($cleaned)->not->toContain('<script>')
        ->not->toContain('alert(')
        ->toContain('<p>Safe content</p>');
});

test('Table sanitizes removes event handlers', function () {
    $table = new Table(data: []);

    $malicious = '<a href="#" onclick="alert(\'XSS\')">Click</a>';
    $cleaned = $table->sanitizeHtml($malicious);

    expect($cleaned)->not->toContain('onclick')
        ->toContain('<a');
});

test('Table sanitizes removes javascript protocol', function () {
    $table = new Table(data: []);

    $malicious = '<a href="javascript:alert(\'XSS\')">Click</a>';
    $cleaned = $table->sanitizeHtml($malicious);

    expect($cleaned)->not->toContain('javascript:')
        ->toContain('href="#"');
});
