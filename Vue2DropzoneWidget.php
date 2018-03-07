<?php

namespace indicalabs\dropzone;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\widgets\InputWidget;
use yii\web\View;

class Vue2DropzoneWidget extends \yii\base\Widget //InputWidget
{
    /**
     * @var array The HTML tag attributes for the widget container tag.
     *
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options = [];
    /**
     * @var array The options for the Vue.js.
     *
     * @see https://vuejs.org/v2/api/#Options-Data for informations about the supported options.
     */
    public $clientOptions = [];
    /**
     * Initializes the Vue.js.
     *
     * This method will initializes the HTML attributes for container.
     * After will be registered the Vue asset bundle.
     * If you override this method, make sure you call the parent implementation first.
     */
    public function init()
    {
        parent::init();
        $this->initOptions();
        $this->initClientOptions();
        $this->registerJs();
    }
    /**
     * Initializes the HTML tag attributes for the widget container tag.
     */
    protected function initOptions()
    {
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
    }
    /**
     * Initializes the options for the Vue object
     */
    protected function initClientOptions()
    {
        if (!isset($this->clientOptions['el'])) {
            $this->clientOptions['el'] = "#{$this->getId()}";
        }
    }
    
    
    /**
     * Registers a specific asset bundles.
     * @throws \yii\base\InvalidArgumentException
     */
    protected function registerJs()
    {
        Vue2Asset::register($this->getView());
        $options = Json::htmlEncode($this->clientOptions);
        
        Vue2DropzoneAsset::register($this->getView());
        
        $js = <<< JS
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.css'

export default {
  name: 'app',
  components: {
    vueDropzone: vue2Dropzone
  },
  data: function () {
    return {
      dropzoneOptions: {
          url: 'https://httpbin.org/post',
          thumbnailWidth: 150,
          maxFilesize: 0.5,
          headers: { "My-Awesome-Header": "header value" }
      }
    }
  }
}
JS;
        $js = "var app = new Vue({$options})";
        $this->getView()->registerJs($js, View::POS_END);
    }
    /**
     * @inheritdoc
     */
    public static function begin($config = [])
    {
        $object = parent::begin($config);
        echo Html::beginTag('div', $object->options);
        return $object;
    }
    /**
     * @inheritdoc
     */
    public static function end()
    {
        echo Html::endTag('div');
        return parent::end();
    }
    
    
}
