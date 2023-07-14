<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<main>
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <span class="fs-4"><?=Yii::$app->params['site']['header']?></span>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item"><a href="/task/?id=1" class="nav-link <?=Yii::$app->init->active_menu_code === 't1' ? 'active' : ''?>" aria-current="page">Задание 1</a></li>
                <li class="nav-item"><a href="/task/?id=2" class="nav-link <?=Yii::$app->init->active_menu_code === 't2' ? 'active' : ''?>" aria-current="page">Задание 2</a></li>
                <li class="nav-item"><a href="/task/?id=3" class="nav-link <?=Yii::$app->init->active_menu_code === 't3' ? 'active' : ''?>" aria-current="page">Задание 3</a></li>
                <?if(Yii::$app->user->identity):?>
                <li class="nav-item"><a href="/admin/" class="nav-link <?=Yii::$app->init->active_menu_code === 'admin' ? 'active' : ''?>" aria-current="page">Администрирование</a></li>
                <?else:?>
                <li class="nav-item"><a href="/login/" class="nav-link" aria-current="page">Вход</a></li>
                <?endif;?>
            </ul>
        </header>
    </div>
    <div class="container">
        <?= $content ?>
    </div>
</main>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
