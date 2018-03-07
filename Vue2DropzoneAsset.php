<?php
namespace indicalabs\dropzone;

use yii\web\AssetBundle;

/**
 * @author Venu Narukulla
 * @since 2.0
 */
class Vue2DropzoneAsset extends AssetBundle
{
	public $sourcePath = '@npm/vue2-dropzone/dist';
	
	public $js = [
			'vue2Dropzone.js',
	];
	
	public $css = [
	        'vue2Dropzone.css',
	];
	public $img = [
//			'build/img/flags.png',
	];
	public $depends = [
	];
}
