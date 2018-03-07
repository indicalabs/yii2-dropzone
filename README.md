Yii2 dropzone extension
=========================
Upload images 

PLease do not use - it is an experiment

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist indicalabs/yii2-dropzone "*"
```

or add

```
"indicalabs/yii2-dropzone": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= \indicalabs\dropzone\DropzoneWidget::widget(); ?>```