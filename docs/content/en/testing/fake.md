---
title: 'Fake Telegram interaction'
menuTitle: 'Fake'
description: ''
category: 'Testing'
fullscreen: false 
position: 50
---

In order to avoid sending real messages to Telegram when testing, the `Telegraph` facade offers a `::fake()` method to start registering sent messages internally instead of sending them to Telegram APIs.

```php
use DefStudio\Telegraph\Facades\Telegraph;

Telegraph::fake();

Telegraph::message("Hello devs!")->send();

// the message won be actually sent to telegram, but can still be asserted

Telegraph::assertSent('Hello devs!');

```

### Custom responses

If needed for testing purpose, the `::fake()` helper can accept an array of responses to be returned for each endpoint call:

```php
 Telegraph::fake([
   \DefStudio\Telegraph\Telegraph::ENDPOINT_MESSAGE => ['result' => 'oooook'],
]);

$response = Telegraph::message('foo')->send();

//$response will be a Response containing a json body: {"result":"oooook"}
```

### Sent data dump

For debugging purpose, a dump of the sent data can be obtained with:

```php
Telegraph::fake();

// Telegraph requests...

Telegraph::dumpSentData();
```
