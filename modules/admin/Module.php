<?php
namespace app\modules\admin;
class Module extends \yii\base\Module
{
    public function init()
    {
        parent::init();
        \Yii::$app->init->active_menu_code = 'admin';
    }
}