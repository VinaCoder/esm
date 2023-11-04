<?php

use Livewire\Volt\Volt;

it('can render', function () {
    $component = Volt::test('index');

    $component->assertSee('hello world');
});
