<?php
namespace MassimoFilippi\SlackModule\Service;

use Maknz\Slack\Message;

/**
 * Interface SlackServiceInterface
 * @package MassimoFilippi\SlackModule\Service
 */
interface SlackServiceInterface
{
    public function sendMessage(Message $slackMessage);
}