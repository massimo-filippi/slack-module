<?php
namespace MassimoFilippi\SlackModule\Model;

/**
 * Class AttachmentAction
 * @package MassimoFilippi\SlackModule\Model
 */
class AttachmentAction
{
    /**
     * The required name field of the action
     *
     * @var string
     */
    protected $name = "";

    /**
     * The required text field of the action
     *
     * @var string
     */
    protected $text = "";

    /**
     * The required type field of the action
     *
     * @var string
     */
    protected $type = "";

    /**
     * The optional url field of the action
     *
     * @var string
     */
    protected $url;

    /**
     * The optional value field of the action
     *
     * @var string
     */
    protected $value;

    /**
     * The optional confirm field of the action
     *
     * @var AttachmentActionConfirm
     */
    protected $confirm;

    /**
     * The optional style field of the action
     *
     * @var string
     */
    protected $style = "default";

    /**
     * The optional options field of the action, used for message menus
     *
     * @var array
     */
    protected $options;

    /**
     * The optional option_groups field of the action, used for message menus
     *
     * @var array
     */
    protected $option_groups;

    /**
     * The optional data_source field of the action, used for message menus
     *
     * @var string
     */
    protected $data_source;

    /**
     * The optional selected_options field of the action, used for message menus
     *
     * @var string
     */
    protected $selected_options;

    /**
     * The optional min_query_length field of the action, used for message menus
     *
     * @var int
     */
    protected $min_query_length;

    const TYPE_BUTTON = 'button';
    const TYPE_SELECT = 'select';

    const STYLE_DEFAULT = 'default';
    const STYLE_PRIMARY = 'primary';
    const STYLE_DANGER = 'danger';

    const DATA_SOURCE_STATIC = 'static';
    const DATA_SOURCE_USERS = 'users';
    const DATA_SOURCE_CHANNELS = 'channels';
    const DATA_SOURCE_CONVERSATIONS = 'conversations';
    const DATA_SOURCE_EXTERNAL = 'external';

    /**
     * AttachmentAction constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes)
    {
        if(isset($attributes['name'])) $this->setName($attributes['name']); else throw new \InvalidArgumentException('The name field of the action is required.');
        if(isset($attributes['text'])) $this->setText($attributes['text']); else throw new \InvalidArgumentException('The text field of the action is required.');
        if(isset($attributes['type'])) $this->setType($attributes['type']); else throw new \InvalidArgumentException('The type field of the action is required.');
        if(isset($attributes['url'])) $this->setUrl($attributes['url']);
        if(isset($attributes['value'])) $this->setValue($attributes['value']);
        if(isset($attributes['confirm'])) $this->setConfirm($attributes['confirm']);
        if(isset($attributes['style'])) $this->setStyle($attributes['style']);
        if(isset($attributes['options'])) $this->setOptions($attributes['options']);
        if(isset($attributes['option_groups'])) $this->setOptionGroups($attributes['option_groups']);
        if(isset($attributes['data_source'])) $this->setDataSource($attributes['data_source']);
        if(isset($attributes['selected_options'])) $this->setSelectedOptions($attributes['selected_options']);
        if(isset($attributes['min_query_length'])) $this->setMinQueryLength($attributes['min_query_length']);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
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
     * @return $this
     */
    public function setText(string $text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType(string $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return $this
     */
    public function setUrl(string $url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setValue(string $value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return AttachmentActionConfirm
     */
    public function getConfirm()
    {
        return $this->confirm;
    }

    /**
     * @param AttachmentActionConfirm|array $confirm
     * @return $this
     */
    public function setConfirm($confirm)
    {
        if($confirm instanceof AttachmentActionConfirm) {
            $this->confirm = $confirm;

            return $this;
        } elseif(is_array($confirm)) {
            $this->confirm = new AttachmentActionConfirm($confirm);

            return $this;
        }

        throw new \InvalidArgumentException('The confirm must be an instance of '. AttachmentActionConfirm::class .' or a keyed array');
    }

    /**
     * @return string
     */
    public function getStyle()
    {
        return $this->style;
    }

    /**
     * @param string $style
     * @return $this
     */
    public function setStyle(string $style)
    {
        $this->style = $style;

        return $this;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param array $options
     * @return $this
     */
    public function setOptions(array $options)
    {
        $this->options = $options;

        return $this;
    }

    /**
     * @return array
     */
    public function getOptionGroups()
    {
        return $this->option_groups;
    }

    /**
     * @param array $option_groups
     * @return $this
     */
    public function setOptionGroups(array $option_groups)
    {
        $this->option_groups = $option_groups;

        return $this;
    }

    /**
     * @return string
     */
    public function getDataSource()
    {
        return $this->data_source;
    }

    /**
     * @param string $data_source
     * @return $this
     */
    public function setDataSource(string $data_source)
    {
        $this->data_source = $data_source;

        return $this;
    }

    /**
     * @return string
     */
    public function getSelectedOptions()
    {
        return $this->selected_options;
    }

    /**
     * @param string $selected_options
     * @return $this
     */
    public function setSelectedOptions(string $selected_options)
    {
        $this->selected_options = $selected_options;

        return $this;
    }

    /**
     * @return int
     */
    public function getMinQueryLength()
    {
        return $this->min_query_length;
    }

    /**
     * @param int $min_query_length
     * @return $this
     */
    public function setMinQueryLength(int $min_query_length)
    {
        $this->min_query_length = $min_query_length;

        return $this;
    }

    /**
     * Get the array representation of this attachment action
     *
     * @return array
     */
    public function toArray()
    {
        $data = [
            'name' => $this->getName(),
            'text' => $this->getText(),
            'type' => $this->getType(),
            'style' => $this->getStyle(),
        ];

        if($this->getUrl()) $data['url'] = $this->getUrl();
        if($this->getValue()) $data['value'] = $this->getValue();
        if($this->getConfirm()) $data['confirm'] = $this->getConfirm()->toArray();
        if($this->getOptions()) $data['options'] = $this->getOptions();
        if($this->getOptionGroups()) $data['option_groups'] = $this->getOptionGroups();
        if($this->getDataSource()) $data['data_source'] = $this->getDataSource();
        if($this->getSelectedOptions()) $data['selected_options'] = $this->getSelectedOptions();
        if($this->getMinQueryLength()) $data['min_query_length'] = $this->getMinQueryLength();

        return $data;
    }
}