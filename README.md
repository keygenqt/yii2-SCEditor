Yii2 SCEditor
===================

![Packagist Downloads](https://img.shields.io/packagist/dt/keygenqt/yii2-SCEditor?label=Packagist%20Downloads)

Extension yii2 allowing to use library [SCEditor](https://www.sceditor.com/).

<p>
    <a href="https://old.keygenqt.com/work/yii2-SCEditor">
        <img src="data/demo_button.gif" width="136px"/>
    </a>
</p>

#### Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

```
"require": {
    "keygenqt/yii2-sceditor": "*"
}
```

#### Usage

```php
<?= $form->field($model, 'text')->widget(\keygenqt\sceditor\SCEditor::className(), [
    'jsOption' => [
        'height' => 300,
        'resizeWidth' => false,
        'toolbar' => "bold,italic,underline,strike|bulletlist,orderedlist,horizontalrule|link,emoticon,image,youtube|date,time|unlink,removeformat" . (YII_DEBUG ? '|source' : ''),
        'style' => 'minified/jquery.sceditor.default.min.css',
    ]
]) ?>
```

#### License

```
Copyright 2017-2024 Vitaliy Zarubin

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
```
