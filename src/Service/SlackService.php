<?php
namespace MassimoFilippi\SlackModule\Service;

use Maknz\Slack\AttachmentField;
use Maknz\Slack\Client;
use Maknz\Slack\Message;
use MassimoFilippi\SlackModule\Model\Attachment;
use MassimoFilippi\SlackModule\Model\AttachmentAction;

/**
 * Class SlackService
 * @package MassimoFilippi\SlackModule\Service
 */
class SlackService implements SlackServiceInterface
{
    /**
     * @var Client
     */
    protected $slackClient;

    /**
     * SlackService constructor.
     * @param Client $slackClient
     */
    public function __construct(Client $slackClient)
    {
        $this->slackClient = $slackClient;
    }

    /**
     * @param Message $slackMessage
     */
    public function sendMessage(Message $slackMessage)
    {
        $this->slackClient->sendMessage($slackMessage);
    }

    /**
     * @return \Maknz\Slack\Message
     */
    public function createMessage()
    {
        return $this->slackClient->createMessage();
    }

    /**
     * @param array $attributes
     * @return Attachment
     */
    public function createAttachment(array $attributes) {
        return new Attachment($attributes);
    }

    /**
     * @param array $attributes
     * @return AttachmentField
     */
    public function createAttachmentField(array $attributes) {
        return new AttachmentField($attributes);
    }

    /**
     * @param array $attributes
     * @return AttachmentAction
     */
    public function createAttachmentAction(array $attributes) {
        return new AttachmentAction($attributes);
    }

    /**
     * Pass any unhandled methods through to a new Message
     * instance
     *
     * @param string $name The name of the method
     * @param array $arguments The method arguments
     * @return \Maknz\Slack\Message
     */
    public function __call($name, $arguments)
    {
        return $this->slackClient->__call($name, $arguments);
    }

    /**
     * @return Client
     */
    public function getSlackClient(): Client
    {
        return $this->slackClient;
    }

    /**
     * @param Client $slackClient
     */
    public function setSlackClient(Client $slackClient)
    {
        $this->slackClient = $slackClient;
    }
}