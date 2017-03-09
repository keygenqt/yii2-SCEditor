yii2-sceditor
===================

Wrap on a wonderful library [SCEditor](https://github.com/samclarke/SCEditor).

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either add

```
"require": {
    "keygenqt/yii2-sceditor": "*"
}
```

of your `composer.json` file.

## Latest Release

The latest version of the module is v0.5.0 `BETA`.

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

## License

**yii2-sceditor** is released under the BSD 3-Clause License. See the bundled `LICENSE.md` for details.


