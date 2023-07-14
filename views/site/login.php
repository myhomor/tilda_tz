<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\forms\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="vh-100 gradient-custom">
    <div class="container h-100">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem; background: url('/img/1559370644.jpg') center; background-size: cover;">
                    <div class="card-body p-5 text-center" style="border-radius: 1rem;background: #333333b5">
                        <?php $form = ActiveForm::begin([
                            'class' => 'mb-md-5 mt-md-4 pb-5',
                            'fieldConfig' => [
                                'template' => "{label}\n{input}\n{error}",
                                'labelOptions' => ['class' => 'form-label'],
                                'inputOptions' => ['class' => 'form-control form-control-lg'],
                                'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
                            ],
                        ]); ?>
                        <?if(isset($error)):?><p class="text-white-50 mb-5"><?=$error?></p><?endif;?>
                        <?= $form->field($model, 'username')->textInput(['autofocus' => true,'value' => Yii::$app->params['user_login']])->label('Логин') ?>

                        <?= $form->field($model, 'password')->passwordInput(['value' =>Yii::$app->params['user_paswd']])->label('Пароль') ?>
                        <div class="form-group">
                            <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>