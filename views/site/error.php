<?include_once __DIR__.'/../include/header.php';
use yii\helpers\Html;
$this->title = $name;
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        Если у вас остались вопросы, пожалуйста, сообщите в службу поддержки support@orbit-space.ru
    </p>
</div>
<?include_once __DIR__.'/../include/footer.php'?>