<?php

namespace keygenqt\sceditor;

use \yii\web\AssetBundle;

/**
 * @author KeyGen <keygenqt@gmail.com>
 */
class ActiveAssets extends AssetBundle
{
	public $sourcePath = '@keygenqt/sceditor/assets';

	public $depends = [
		'yii\web\JqueryAsset'
	];

	public $css = [
		'css/yii2-sceditor.css',
	];
}
