<?php

namespace keygenqt\sceditor;

use \yii\web\AssetBundle;

/**
 * @author KeyGen <keygenqt@gmail.com>
 */
class BowerAssets extends AssetBundle
{
	public $sourcePath = '@bower/sceditor';

	public $css = [
		'minified/themes/monocons.min.css',
	];

	public $js = [
		'minified/jquery.sceditor.bbcode.min.js',
		'minified/jquery.sceditor.xhtml.min.js',
		'minified/jquery.sceditor.min.js',
	];
}
