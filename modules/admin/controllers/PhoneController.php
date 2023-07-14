<?php
namespace app\modules\admin\controllers;

use app\modules\admin\models;
class PhoneController extends Common
{
    protected function _myBeforeAction($action)
    {
        parent::_myBeforeAction($action);
        $this->model = new models\PhoneModel;
        $this->form = new models\forms\PhoneForm;
        \Yii::$app->init->active_menu_code_admin = 'phone';
    }
}