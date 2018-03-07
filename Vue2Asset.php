<?php
namespace indicalabs\dropzone;

use yii\web\AssetBundle;
use yii\web\View;
/**
 * @author Venu Narukulla
 * @since 2.0
 */
class Vue2Asset extends AssetBundle
{
    
    /**
     * @inheritdoc
     */
    public $sourcePath = '@npm/vue/dist';
    /**
     * @inheritdoc
     */
    public $js = [
        YII_ENV_DEV ? 'vue.js' : 'vue.min.js',
    ];
    /**
     * @inheritdoc
     */
    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];
}
