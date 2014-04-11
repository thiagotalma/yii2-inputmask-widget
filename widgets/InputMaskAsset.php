<?php

/**
 * @copyright Copyright &copy; Thiago Talma, thiagomt.com, 2014
 * @package yii2-jquery.inputmask
 * @version 1.0.0
 */

namespace talma\widgets;

use yii\web\AssetBundle;

/**
 * Asset bundle for jquery.inputmask Widget
 *
 * @author Thiago Talma <thiago@thiagomt.com>
 * @since 1.0
 */
class InputMaskAsset extends AssetBundle
{
    public $js = [
        'jquery.inputmask.js',
        'jquery.inputmask.extensions.js',
        'jquery.inputmask.date.extensions.js',
        'jquery.inputmask.numeric.extensions.js',
        'jquery.inputmask.regex.extensions.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = __DIR__ . '/../assets';
        parent::init();
    }
}
