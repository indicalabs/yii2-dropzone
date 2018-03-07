<?php
namespace indicalabs\dropzone;

use yii\web\AssetBundle;
use yii\web\View;
/**
 * @author Venu Narukulla
 * @since 2.0
 */
class AxiosAsset extends AssetBundle
{    public $sourcePath = '@bower/axios/dist';

    public $js = [
    'axios.min.js',
    ];
}
