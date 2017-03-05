<?php

namespace yii2mod\selectize;

use yii\web\AssetBundle;

/**
 * Class SelectizeAsset
 *
 * @package yii2mod\selectize
 */
class SelectizeAsset extends AssetBundle
{
    /**
     * @var string the directory that contains the source asset files for this asset bundle
     */
    public $sourcePath = '@bower/selectize.js/dist';

    /**
     * @var array list of CSS files that this bundle contains
     */
    public $css = [
        'css/selectize.default.css',
    ];

    /**
     * @var array list of JavaScript files that this bundle contains
     */
    public $js = [
        'js/standalone/selectize.js',
    ];

    /**
     * @var array list of bundle class names that this bundle depends on
     */
    public $depends = [
        'yii\web\YiiAsset',
        'yii\jui\JuiAsset',
    ];
}
