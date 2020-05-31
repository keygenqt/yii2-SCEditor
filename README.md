[SCEditor](https://keygenqt.com/work/yii2-SCEditor)
===================

![GitHub](https://img.shields.io/github/license/keygenqt/yii2-SCEditor)
![Packagist Downloads](https://img.shields.io/packagist/dt/keygenqt/yii2-SCEditor)

Extension yii for library [SCEditor](https://www.sceditor.com/)

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either add

```
"require": {
    "keygenqt/yii2-sceditor": "*"
}
```

of your `composer.json` file.

## Usage

```php
if ($model->load(Yii::$app->request->post())) {
    $model->text = keygenqt\sceditor\SCEditor::getValue($model->text, [
        'AutoFormat.RemoveEmpty' => true,
        'HTML.SafeIframe' => true,
        'URI.SafeIframeRegexp' => '%^(https?:)?//(www\.youtube(?:-nocookie)?\.com/embed/|player\.vimeo\.com/video/)%',
    ]);
...
```

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