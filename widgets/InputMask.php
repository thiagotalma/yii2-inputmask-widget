<?php

/**
 * @copyright Copyright &copy; Thiago Talma, thiagomt.com, 2014
 * @package yii2-notify
 * @version 1.0.0
 */

namespace talma\widgets;

use yii\base\InvalidConfigException;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;

/**
 * Talma Notify widget is a Yii2 wrapper for the Bootstrap Notify.
 *
 * @author Thiago Talma <thiago@thiagomt.com>
 * @since 1.0
 * @see https://github.com/RobinHerbots/jquery.inputmask
 */
class InputMask extends InputWidget
{
    /**
     * @var string Mask to apply
     */
    public $mask;

    /**
     * @var string Hash of mask options
     */
    public $hashMask;

    /**
     * @var string Alias to Mask to apply
     */
    public $alias;

    /**
     * @var array Additional config
     */
    public $config = [];
    
    /**
     * @var array the HTML attributes for the input tag.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options = ['class' => 'form-control'];

    /**
     * Initializes the widget.
     * @throws InvalidConfigException if the "mask" property is not set.
     */
    public function init()
    {
        parent::init();
        if (empty($this->mask) && empty($this->alias)) {
            throw new InvalidConfigException('The "mask" or "alias" property must be set.');
        } elseif (!empty($this->mask) && !empty($this->alias)) {
            throw new InvalidConfigException('Only one property between "mask" and "alias" must be set.');
        }
    }

    /**
     * Runs the widget.
     */
    public function run()
    {
        $this->registerClientScript();

        $this->options['data-plugin-name'] = 'inputmask';
        $this->options['data-plugin-options'] = $this->hashMask;

        if ($this->hasModel()) {
            echo Html::activeTextInput($this->model, $this->attribute, $this->options);
        } else {
            echo Html::textInput($this->name, $this->value, $this->options);
        }
    }

    /**
     * Registers the needed JavaScript.
     */
    public function registerClientScript()
    {
        $options = $this->getClientOptions();
        $this->hashMask = 'inputmask_' . hash('crc32', serialize($options));
        $js = '';
        $id = $this->options['id'];
        $view = $this->getView();
        $view->registerJs("var {$this->hashMask} = {$options};", $view::POS_HEAD);
        $js .= "jQuery(\"#{$id}\").inputmask({$this->hashMask});";
        InputMaskAsset::register($view);
        $view->registerJs($js);
    }

    /**
     * @return array the options for the text field
     */
    protected function getClientOptions()
    {
        if ($this->mask) {
            $options['mask'] = $this->mask;
        } else {
            $options['alias'] = $this->alias;
        }

        $options = array_merge($options, $this->config);
        return Json::encode($options);
    }
}
