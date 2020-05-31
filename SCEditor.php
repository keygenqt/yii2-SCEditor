<?php
/*
 * Copyright 2020 Vitaliy Zarubin
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace keygenqt\sceditor;

use yii\base\Model;
use yii\helpers\HtmlPurifier;

/**
 * @property Model $model
 * @property string $attribute
 * @property string $value
 * @property array $jsOption
 * @property string $id
 * @property string $classname
 */
class SCEditor extends \yii\base\Widget
{
    public $model;
    public $attribute;
    public $value;

    public $jsOption = [];

    public $id;
    public $classname;

    public function run()
    {
        if ($this->model == null) {
            $this->id = $this->getId();
        } else {
            $this->classname = strtolower((new \ReflectionClass($this->model))->getShortName());
            $this->id = "{$this->classname}-$this->attribute";
        }

        $active = ActiveAssets::register($this->getView())->baseUrl;
        $assets = BowerAssets::register($this->getView())->baseUrl;

        $this->jsOption['style'] = $assets . '/' . $this->jsOption['style'];
        $this->jsOption['emoticons'] = [
            'dropdown' => [
                ':)' => $assets . '/' . 'emoticons/smile.png',
                ':angel:' => $assets . '/' . 'emoticons/angel.png',
                ':angry:' => $assets . '/' . 'emoticons/angry.png',
                '8-)' => $assets . '/' . 'emoticons/cool.png',
                ':\'(' => $assets . '/' . 'emoticons/cwy.png',
                ':ermm:' => $assets . '/' . 'emoticons/ermm.png',
                ':D' => $assets . '/' . 'emoticons/grin.png',
                '<3' => $assets . '/' . 'emoticons/heart.png',
                ':(' => $assets . '/' . 'emoticons/sad.png',
                ':O' => $assets . '/' . 'emoticons/shocked.png',
                ':P' => $assets . '/' . 'emoticons/tongue.png',
                ';)' => $assets . '/' . 'emoticons/wink.png'
            ],
            'more' => [
                ':alien:' => $assets . '/' . 'emoticons/alien.png',
                ':blink:' => $assets . '/' . 'emoticons/blink.png',
                ':blush:' => $assets . '/' . 'emoticons/blush.png',
                ':cheerful:' => $assets . '/' . 'emoticons/cheerful.png',
                ':devil:' => $assets . '/' . 'emoticons/devil.png',
                ':dizzy:' => $assets . '/' . 'emoticons/dizzy.png',
                ':getlost:' => $assets . '/' . 'emoticons/getlost.png',
                ':happy:' => $assets . '/' . 'emoticons/happy.png',
                ':kissing:' => $assets . '/' . 'emoticons/kissing.png',
                ':ninja:' => $assets . '/' . 'emoticons/ninja.png',
                ':pinch:' => $assets . '/' . 'emoticons/pinch.png',
                ':pouty:' => $assets . '/' . 'emoticons/pouty.png',
                ':sick:' => $assets . '/' . 'emoticons/sick.png',
                ':sideways:' => $assets . '/' . 'emoticons/sideways.png',
                ':silly:' => $assets . '/' . 'emoticons/silly.png',
                ':sleeping:' => $assets . '/' . 'emoticons/sleeping.png',
                ':unsure:' => $assets . '/' . 'emoticons/unsure.png',
                ':woot:' => $assets . '/' . 'emoticons/w00t.png',
                ':wassat:' => $assets . '/' . 'emoticons/wassat.png'
            ],
            'hidden' => [
                ':whistling:' => $assets . '/' . 'emoticons/whistling.png',
                ':love:' => $assets . '/' . 'emoticons/wub.png'
            ]
        ];

        $this->jsOption = \yii\helpers\Json::encode($this->jsOption);
        $this->getView()->registerJs("$('#{$this->id}').sceditor({$this->jsOption});");

        $this->getView()->registerJs("$(function() {setTimeout(function() { $('.load-SCEditor').fadeOut(150) }, 50);})");
        $this->getView()->registerJs("
            $('#{$this->id}').closest('form').submit(function () {
                if ($('#{$this->id}').val() == '<p><br></p>') {
                    $('#{$this->id}').val('')
                }
            });
        ");

        if ($this->model == null) {
            return \yii\helpers\Html::textarea($this->attribute, $this->value, [
                'id' => $this->id,
            ]);
        } else {
            return \yii\helpers\Html::activeTextarea($this->model, $this->attribute);
        }
    }
}