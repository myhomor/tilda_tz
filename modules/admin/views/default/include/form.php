<?php
/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $_form */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

if( isset($form) && isset($form['fields']) && isset($form['model']) )
{
     $_form = ActiveForm::begin([
        'class' => '',
        'fieldConfig' => [
            'template' => "{label}\n{input}\n{error}",
            'labelOptions' => ['class' => 'form-label'],
            'inputOptions' => ['class' => 'form-control form-control-lg'],
            'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
        ],
    ]);

    foreach ($form['fields'] as $field)
    {
        switch ($field['type'])
        {
            case 'select':
                if( !isset($field['value_list']) ) break;
                if( isset($form['value']) && isset($form['value'][$field['code']]) )
                    $form['model']->{$field['code']} = $form['value'][$field['code']];

                echo $_form->field($form['model'], $field['code'])
                    ->dropDownList($field['value_list'])
                    ->label($field['title']);
                break;
            case 'input':
            default:

                echo $_form->field($form['model'], $field['code'])
                    ->textInput([
                            'value' => (
                                isset($form['value']) && is_array($form['value']) && isset($form['value'][$field['code']])
                                ? $form['value'][$field['code']]
                                : ''
                            ),
                            'class' => 'form-control form-control-lg '.(isset($field['class'])?$field['class']:'')
                    ])
                    ->label($field['title']);
                break;
        }
    }?>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
    </div>

    <?php ActiveForm::end();
}