<?php

namespace keygenqt\sceditor;

use yii2fullcalendar\CoreAsset;

class SCEditor extends \yii\base\Widget
{
    public $model;
    public $attribute;
    public $value;

    public $options = [];
    public $jsOption = [];

    public function run()
    {
        ActiveAssets::register($this->getView());
        $assets = BowerAssets::register($this->getView())->baseUrl;

        $this->jsOption['style'] = $assets . '/' . $this->jsOption['style'];
        $this->jsOption['emoticons'] = [
            'dropdown' => [
               ':)' =>  $assets . '/' . 'emoticons/smile.png',
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
        $this->getView()->registerJs("$('#{$this->getId()}').sceditor({$this->jsOption});");

        if ($this->model == null) {
            return \yii\helpers\Html::textarea($this->attribute, $this->value, \yii\helpers\ArrayHelper::merge($this->options, [
                'id' => $this->getId(),
            ]));
        } else {
            return \yii\helpers\Html::activeTextarea($this->model, $this->attribute, \yii\helpers\ArrayHelper::merge($this->options, [
                'id' => $this->getId(),
            ]));
        }
    }
}