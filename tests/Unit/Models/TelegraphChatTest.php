<?php

use DefStudio\Telegraph\Facades\Telegraph;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;

it('can send a text message', function () {
    Telegraph::fake();
    $chat = make_chat();

    $chat->message('foo')->send();

    Telegraph::assertSent('foo');
});

it('can send an html message', function () {
    $chat = make_chat();

    $telegraph = $chat->html('foo');

    expect($telegraph->getUrl())->toContain('parse_mode=html');
});

it('can send a markdown message', function () {
    $chat = make_chat();

    $telegraph = $chat->markdown('foo');

    expect($telegraph->getUrl())->toContain('parse_mode=markdown');
});

it('can replace a keyboard', function () {
    Telegraph::fake();
    $chat = make_chat();

    $chat->replaceKeyboard(123456, Keyboard::make()->buttons([
        Button::make('test')->url('aaa'),
    ]))->send();

    Telegraph::assertSentData(\DefStudio\Telegraph\Telegraph::ENDPOINT_REPLACE_KEYBOARD, [
        'reply_markup' => '{"inline_keyboard":[[{"text":"test","url":"aaa"}]]}',
    ]);
});

it('can delete a keyboard', function () {
    Telegraph::fake();
    $chat = make_chat();

    $chat->deleteKeyboard(123456)->send();

    Telegraph::assertSentData(\DefStudio\Telegraph\Telegraph::ENDPOINT_REPLACE_KEYBOARD, [
        'reply_markup' => '',
    ]);
});
