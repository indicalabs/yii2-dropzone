<?php
namespace indicalabs\dropzone;

use yii\web\AssetBundle;

/**
 * @author Venu Narukulla
 * @since 2.0
 */
class DropzoneAsset extends AssetBundle
{
	public $sourcePath = '@npm/dropzone/dist';
	
	public $js = [
			//'dropzone.js',
			'dropzone-amd-module.js'
	];
	
	public $css = [
	        'basic.css',
			'dropzone.css',
	];
	public $img = [
//			'build/img/flags.png',
	];
	public $depends = [
// 	    'yii\web\JqueryAsset',
// 	    'yii\jui\JuiAsset'
	];
}
