<?php

return [
    'massimo_filippi' => [
        'slack_module' => [
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
];
