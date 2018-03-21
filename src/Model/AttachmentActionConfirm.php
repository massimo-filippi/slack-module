<?php
namespace MassimoFilippi\SlackModule\Model;

/**
 * Class AttachmentActionConfirm
 * @package MassimoFilippi\SlackModule\Model
 */
class AttachmentActionConfirm
{
    /**
     * Title the pop up window. Please be brief.
     * Optional field
     *
     * @var string
     */
    protected $title;

    /**
     * Describe in detail the consequences of the action and contextualize your button text choices. Use a maximum of 30 characters or so for best results across form factors.
     * Required field
     *
     * @var string
     */
    protected $text = "";

    /**
     * The text label for the button to continue with an action. Keep it short. Defaults to Okay.
     * Optional field
     *
     * @var string
     */
    protected $okText;

    /**
     * The text label for the button to cancel the action. Keep it short. Defaults to Cancel.
     * Optional field
     *
     * @var string
     */
    protected $dismissText;

    /**
     * AttachmentActionConfirm constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes)
    {
        if(isset($attributes['title'])) $this->setTitle($attributes['title']);
        if(isset($attributes['text'])) $this->setText($attributes['text']); else throw new \InvalidArgumentException('The text field of the confirm is required.');
        if(isset($attributes['ok_text'])) $this->setOkText($attributes['ok_text']);
        if(isset($attributes['dismiss_text'])) $this->setDismissText($attributes['dismiss_text']);
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text)
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getOkText(): string
    {
        return $this->okText;
    }

    /**
     * @param string $okText
     */
    public function setOkText(string $okText)
    {
        $this->okText = $okText;
    }

    /**
     * @return string
     */
    public function getDismissText(): string
    {
        return $this->dismissText;
    }

    /**
     * @param string $dismissText
     */
    public function setDismissText(string $dismissText)
    {
        $this->dismissText = $dismissText;
    }

    /**
     * Get the array representation of this confirm
     *
     * @return array
     */
    public function toArray()
    {
        $data = [
            'text' => $this->getText(),
        ];

        if($this->getTitle()) $data['title'] = $this->getTitle();
        if($this->getTitle()) $data['ok_text'] = $this->getOkText();
        if($this->getTitle()) $data['dismiss_text'] = $this->getDismissText();

        return $data;
    }
}