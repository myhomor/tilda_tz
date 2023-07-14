<?php
namespace app\modules\admin\controllers;
class DefaultController extends Common
{
    public function actionIndex()
    {
        return $this->redirect(['/'.$this->module->id.'/city/list/']);
    }

}