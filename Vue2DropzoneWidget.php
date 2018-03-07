<?php

namespace indicalabs\dropzone;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\widgets\InputWidget;

class Vue2DropzoneWidget extends InputWidget
{
    /**
     * dropzone配置选项，
     * 详情参阅 http://www.dropzonejs.com/#configuration-options
     * @var array
     */
    public $clientOptions = [];
    
    /**dropzone事件侦听
     * 详情参阅 http://www.dropzonejs.com/#event-list
     * @var array
     */
    public $clientEvents = [];
    
    /**
     * dropzone默认配置
     * @var array
     */
    public $options = [];
    
    /**
     * dropzone默认侦听
     * @var array
     */
    public $events = [];
    /**
     * 禁用dropzone自动发现所有元素
     * @var bool
     */
    public $autoDiscover = false;
    
    /**
     * dropzone容器
     * @var string
     */
    public $containerId = 'myDropzone';
    
    /**
     * dropzone预览容器
     * @var string
     */
    public $previewsId = 'dz-previews';
    
    /**
     * 回显的图片数组  数组格式['/uploads/xxxxx.jpg','/uploads/xxxxx.jpg']
     * @var array
     */
    public $mockFiles=[];
    /**
     * 开启图片排序
     * @var bool
     */
    public $sortable = true;
    
    /**
     * Sortable配置参数
     * 详情参阅 https://github.com/RubaXa/Sortable#options
     * @var array
     */
    
    public $sortableOption = [];
    /**
     * 自动上传关闭时,上传按钮的html
     * @var string
     */
    public $upload_button='';
    
    /**
     * input Name名 默认file
     * @var string
     */
    public $inputName='file';
    
    /**
     * 初始化小部件
     */
    public function init()
    {
            parent::init();
            initOptions();
    }
    
    
    public function initOptions(){
        $this->options = [
            'url' => Url::to(['upload']),
            'addRemoveLinks'=>true,
            'dictCancelUpload'=>'取消上传',
            'parallelUploads'=>255,//并行处理的文件数量 默认无限放大 不做限制
            'dictRemoveFile'=>'删除文件',
            'autoProcessQueue' => true, //自动上传
            'maxFilesize' => get_cfg_var("post_max_size") ? (int)get_cfg_var("post_max_size") : 0,//上传大小限制
        ];
        
        //构造请求参数csrf
        if (\Yii::$app->getRequest()->enableCsrfValidation) {
            $this->options['headers'][\yii\web\Request::CSRF_HEADER] = \Yii::$app->getRequest()->getCsrfToken();
            $this->options['params'][\Yii::$app->getRequest()->csrfParam] = \Yii::$app->getRequest()->getCsrfToken();
        }
        
        $this->options = ArrayHelper::merge($this->options, $this->clientOptions);
    }
    
    
    public function run()
    {
        $this->registerAssets('dropzone');
        echo Html::tag('div', $this->content, $this->options);
    }
    
    /**
     * 注册小部件至页面
     */
    protected function registerAssets()
    {
        
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
        $this->getView()->registerJs($js);
    }
    
}
