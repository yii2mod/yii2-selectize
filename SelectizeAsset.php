<?php

namespace yii2mod\selectize;

use yii\web\AssetBundle;

/**
 * Class SelectizeAsset
 * @package yii2mod\selectize
 */
class SelectizeAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@vendor/yii2mod/selectize/assets';

    /**
     * @var array
     */
    public $css = [
        'css/selectize.default.css'
    ];

    /**
     * @var array
     */
    public $js = [
        'js/selectize.js',
    ];

    /**
     * @var array
     */
    public $depends = [
        'yii\web\YiiAsset',
    ];
}