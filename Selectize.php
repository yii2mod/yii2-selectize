<?php

namespace yii2mod\selectize;

use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\widgets\InputWidget;

/**
 * Class Selectize
 *
 * @package yii2mod\selectize
 */
class Selectize extends InputWidget
{
    /**
     * @var array|null the option data items
     */
    public $items;

    /**
     * @var array|string the URL where to get the new options to be loaded into the plugin. This attribute is for basic
     * usage of the `load` configuration option of the plugin. For a more advanced usage of the `load` option, please
     * refer to the Selectize.js usage documentation. Response format must be json.
     */
    public $url;

    /**
     * @var array plugin options
     */
    public $pluginOptions = [];

    /**
     * @inheritdoc
     */
    public function run()
    {
        if (!is_array($this->items)) {
            $this->renderInput();
        } else {
            $this->renderDropDown();
        }

        $this->registerAssets();
    }

    /**
     * Register client assets
     */
    protected function registerAssets()
    {
        $view = $this->getView();
        SelectizeAsset::register($view);
        $js = '$("#' . $this->getInputId() . '").selectize(' . $this->getPluginOptions() . ');';
        $view->registerJs($js, $view::POS_END);
    }

    /**
     * Get plugin options in the json format
     *
     * @return string
     */
    public function getPluginOptions()
    {
        if ($this->url !== null) {
            $url = Url::to($this->url);
            $this->pluginOptions['load'] = new JsExpression("
                function (query, callback) {
                    if (!query.length) return callback();
                    $.getJSON('$url', { query: encodeURIComponent(query) }, function (data) { callback(data); })
                    .fail(function () { callback(); });
                }
            ");
        }

        return Json::encode($this->pluginOptions);
    }

    /**
     * Return input id
     *
     * @return string
     */
    public function getInputId()
    {
        return $this->options['id'];
    }

    /**
     * Render dropdown list
     */
    public function renderDropDown()
    {
        if ($this->hasModel()) {
            echo Html::activeDropDownList($this->model, $this->attribute, $this->items, $this->options);
        } else {
            echo Html::dropDownList($this->name, $this->value, $this->items, $this->options);
        }
    }

    /**
     * Render text input
     */
    public function renderInput()
    {
        if ($this->hasModel()) {
            echo Html::activeTextInput($this->model, $this->attribute, $this->options);
        } else {
            echo Html::textInput($this->name, $this->value, $this->options);
        }
    }
}
