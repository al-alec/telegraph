---
title: 'Interact With The Chat Keyboard'
menuTitle: 'Keyboard Interaction'
description: ''
category: 'Webhooks'
fullscreen: false 
position: 44
---


The keyboard that triggered the callback can be retrieved through the `$originalKeyboard` property, a `Keyboard` object that holds the buttons and can be manipulated with some dedicated methods:

### replaceKeyboard

The entire keyboard can be replaced using the `->replaceKeyboard()` method:

```php
class CustomWebhookHandler extends WebhookHandler
{
    public function dismiss(){
        //...
        
        $newKeyboard = $this->originalKeyboard
            ->deleteButton('Dismiss'); 
        
        $this->replaceKeyboard($newKeyboard);
    }
}
```

### deleteKeyboard

The keyboard can be removed using the `->deleteKeyboard()` method:

```php
class CustomWebhookHandler extends WebhookHandler
{
    public function dismiss(){
        //...
        
        $this->deleteKeyboard();
    }
}
```
