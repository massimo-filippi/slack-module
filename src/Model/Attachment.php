<?php
namespace MassimoFilippi\SlackModule\Model;

/**
 * Class Attachment
 * @package MassimoFilippi\SlackModule\Model
 */
class Attachment extends \Maknz\Slack\Attachment
{
    /**
     * The actions of the attachment
     *
     * @var array
     */
    protected $actions = [];

    /**
     * Attachment constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes)
    {
        parent::__construct($attributes);

        if(isset($attributes['actions'])) $this->setActions($attributes['actions']);
    }

    /**
     * Get the actions for the attachment
     *
     * @return array
     */
    public function getActions()
    {
        return $this->actions;
    }

    /**
     * Set the actions for the attachment
     *
     * @param array $actions
     * @return $this
     */
    public function setActions(array $actions)
    {
        $this->clearActions();

        foreach ($actions as $action) {
            $this->addAction($action);
        }

        return $this;
    }

    /**
     * Add a action to the attachment
     *
     * @param mixed $action
     * @return $this
     */
    public function addAction($action)
    {
        if ($action instanceof AttachmentAction) {
            $this->actions[] = $action;

            return $this;
        } elseif (is_array($action)) {
            $this->actions[] = new AttachmentAction($action);

            return $this;
        }

        throw new \InvalidArgumentException('The attachment action must be an instance of '. AttachmentAction::class .' or a keyed array');
    }

    /**
     * Clear the actions for the attachment
     *
     * @return $this
     */
    public function clearActions() {
        $this->actions = [];

        return $this;
    }

    /**
     * Convert this attachment to its array representation
     *
     * @return array
     */
    public function toArray()
    {
        $data = parent::toArray();

        $data['actions'] = $this->getActionsAsArrays();

        return $data;
    }

    /**
     * Iterates over all actions in this attachment and returns
     * them in their array form
     *
     * @return array
     */
    protected function getActionsAsArrays()
    {
        $actions = [];

        foreach ($this->getActions() as $action) $actions[] = $action->toArray();

        return $actions;
    }
}