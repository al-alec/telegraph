<?php

use DefStudio\Telegraph\Facades\Telegraph as Facade;
use DefStudio\Telegraph\Support\Testing\Fakes\TelegraphFake;
use DefStudio\Telegraph\Telegraph;

test('Telegraph facade is registered', function () {
    expect(Facade::bot(make_bot()))->toBeInstanceOf(Telegraph::class);
});

test('can switch to fake', function () {
    Facade::fake();
    expect(Facade::markdown(make_bot()))->toBeInstanceOf(TelegraphFake::class);
});
