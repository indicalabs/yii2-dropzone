<?php

namespace indicalabs\dropzone;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\widgets\InputWidget;
use yii\web\View;

class Vue2DropzoneWidget extends InputWidget
{
    public $clientOptions = [];
    public function init()
    {
         parent::init();
    }

    public function run()
    {
        $this->registerAssets();
        return Html::tag('div','', []);
    }

    protected function registerAssets()
    {
    
$js = <<< JS
new Vue({
  el: '#dropzone',
    components: {
      vue2dropzone: vue2Dropzone
    },
    data : function () {
          return {
            id: 'dropzone',
            // Other options here...
            
                dropzoneOptions: {
                  url: 'upload',
                  method: 'post',
                  acceptedFiles: 'image/*',
                  uploadMultiple: true,
                  autoProcessQueue: false, // Dropzone should wait for the user to click a button to upload
                  parallelUploads: 15, // Dropzone should upload all files at once (including the form data) not all files individually
                  maxFiles: 15, // this means that they shouldn't be split up in chunks
                  addRemoveLinks: true,
                  thumbnailWidth: 150,
                  maxFilesize: 5,
                  dictDefaultMessage: "<i class='fa fa-cloud-upload'></i> Drop files here to upload (max. 15 files)",
                  
                }
          }
    }
})

JS;
        
        $this->getView()->registerJs($js);
       DropzoneAsset::register($this->getView());
       Vue2Asset::register($this->getView());
       AxiosAsset::register($this->getView());
       Vue2DropzoneAsset::register($this->getView());
       //SortableJsAsset::register($this->getView());
    }
    
}
