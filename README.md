yii2-inputmask-widget
===========
Widget for Yii Framework 2.0 to use [jquery.inputmask](https://github.com/RobinHerbots/jquery.inputmask)

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist thiagotalma/yii2-inputmask "*"
```

or add

```
"thiagotalma/yii2-inputmask": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by :

```php
<?= \talma\widget\InputMask::widget(); ?>;
```