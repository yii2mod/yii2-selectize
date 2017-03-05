<?php

namespace yii2mod\selectize\tests;

use yii\base\DynamicModel;
use yii\helpers\Html;
use yii2mod\selectize\Selectize;

/**
 * Class SelectizeWidgetTest
 *
 * @package yii2mod\selectize\tests
 */
class SelectizeWidgetTest extends TestCase
{
    public function testRenderInput()
    {
        $model = new DynamicModel(['names' => 'Ben']);

        $widget = Selectize::widget([
            'model' => $model,
            'attribute' => 'names',
        ]);

        $this->assertEquals(Html::activeTextInput($model, 'names'), $widget);
    }

    public function testRenderDropDown()
    {
        $model = new DynamicModel(['names' => 'Ben']);
        $items = ['Ben', 'Bob'];

        $widget = Selectize::widget([
            'model' => $model,
            'attribute' => 'names',
            'items' => $items,
        ]);

        $this->assertEquals(Html::activeDropDownList($model, 'names', $items), $widget);
    }
}
