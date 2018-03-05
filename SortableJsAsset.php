<?php
namespace indicalabs\dropzone;

use yii\web\AssetBundle;

/**
 * @author Venu Narukulla
 * @since 2.0
 */
class SortableJsAsset extends AssetBundle
{
	public $sourcePath = '@npm/sortablejs';
	
	public $js = [
			'Sortable.min.js',
	];
	
	public $css = [
	];
	public $depends = [
	];
}
