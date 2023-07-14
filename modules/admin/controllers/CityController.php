<?php
namespace app\modules\admin\controllers;

use app\modules\admin\models;
class CityController extends Common
{
    protected function _myBeforeAction($action)
    {
        parent::_myBeforeAction($action);
        $this->model = new models\CityModel;
        $this->form = new models\forms\CityForm;
        \Yii::$app->init->active_menu_code_admin = 'city';
    }
}