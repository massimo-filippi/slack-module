# slack-module

ZF3 module for Slack communication


[![Packagist](https://img.shields.io/packagist/v/massimo-filippi/slack-module.svg)](https://packagist.org/packages/massimo-filippi/slack-module)
[![License](http://img.shields.io/:license-mit-blue.svg)](http://doge.mit-license.org)

## Introduction

There will be more info soon...

## Installation

### 1. Install via Composer

Install the latest stable version via Composer:

```
composer require massimo-filippi/slack-module
```

Install the latest develop version via Composer:

```
composer require massimo-filippi/slack-module:dev-master
```

### 2. Enable module in your application

Composer should enable `MassimoFilippi\SlackModule` in your project automatically during installation. 

In case it does not, you can enable module manually by adding value `'MassimoFilippi\SlackModule'` to array in file `config/modules.config.php`. At the end, it should look like PHP array below.

```php
<?php

return [
    'Zend\Router',
    'Zend\Validator',
    'MassimoFilippi\SlackModule', // Add this line, ideally before Application module.
    'Application',
];
```

### 3. Set up your configuration

You have to set settings for SlackService, otherwise you will not be able to use it. 

Here is what I have in my `config/autoload/local.php` file.

```php
<?php

return [
    'massimo_filippi' => [
        'slack_module' => [
            'config' => [
                'webhook_url' => 'https://hooks.slack.com/services/#########/#########/########################',
                // Whether names like @regan should be converted into links by Slack, default: false
                'link_names' => false,
                // Whether Slack should unfurl links to text-based content, default: false
                'unfurl_links' => false,
                // Whether Slack should unfurl links to media content such as images and YouTube videos, default: true 
                'unfurl_media' => true,
                // Whether message text should be interpreted in Slack's Markdown-like language. For formatting options, see Slack's help article: http://goo.gl/r4fsdO, default: true
                'allow_markdown' => true,
                // Which attachment fields should be interpreted in Slack's Markdown-like language. By default, Slack assumes that no fields in an attachment should be formatted as Markdown. // default: []
                'markdown_in_attachments' => [],
                
                // Allow Markdown in just the text and title fields
                //// 'markdown_in_attachments' => ['text', 'title']
                // Allow Markdown in all fields
                //// 'markdown_in_attachments' => ['pretext', 'text', 'title', 'fields', 'fallback']
                
                'defaults' => [
                    // default username, set to null to use the default set on the Slack webhook, default: null
                    'username' => 'Slack module',
                    // default channel, channel: #general, user: @john.doe, set to null to use the default set on the Slack webhook, default: null
                    'channel' => '#general',
                    // URL to an image or Slack emoji like :ghost: or :+1:, set null to use the default set on the Slack webhook, default: null 
                    'icon' => null 
                ],
            ],
        ],
    ],
];

```

## Usage

Somewhere in business logic classes.

```php
<?php 

use Maknz\Slack\Message as SlackMessage;
use MassimoFilippi\SlackModule\Model\Attachment as SlackAttachment;

/** @var SlackMessage $slackMessage */
$slackMessage = $this->slackService->createMessage();
$slackMessage->to('#general')
    ->from('John Doe')
    ->withIcon(':ghost:')
    ->setText('This is an amazing message!');

/** @var SlackAttachment $slackAttachment */
$slackAttachment = $this->slackService->createAttachment([
        'fallback' => 'Some fallback text',
        'text' => 'The attachment text'
    ]);
$slackMessage->attach($slackAttachment);

try {
    // Injected MassimoFilippi\SlackModule\Service\SlackService.
    $this->slackService->sendMessage($slackMessage);
} catch (\Exception $exception) {
    var_dump($exception->getMessage());
}
```

## Methods

* Create message:
    * ```$this->slackService->createMessage();```
* Create attachment:
    * ```$this->slackService->createAttachment($arguments);```
    * See Slack documentation: https://api.slack.com/docs/message-attachments
* Create attachment field:
    * ```$this->slackService->createAttachementField($arguments);```
    * See Slack documentation: https://api.slack.com/docs/message-attachments

* Create attachment action:
    * ```$this->slackService->createAttachementAction($arguments);```
    * See Slack documentation: https://api.slack.com/docs/message-attachments

## More resources

* Slack - Messages: https://api.slack.com/docs/messages
* Slack - Message attachments: https://api.slack.com/docs/message-attachments
* Slack - Message guidelines: https://api.slack.com/best-practices/message-guidelines
* Slack - Message builder: https://api.slack.com/docs/messages/builder
