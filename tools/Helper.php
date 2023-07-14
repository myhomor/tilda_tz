<?php
namespace app\tools;

use Yii;

trait Helper
{
    protected function setSessionVal($name, $value)
    {
        if (!Yii::$app->session->isActive)
            Yii::$app->session->open();

        Yii::$app->session->set($name, $value);
    }

    protected function getSessionVal($name)
    {
        return Yii::$app->session->has($name) ? Yii::$app->session->get($name) : false;
    }

    public function delSessionValue($name)
    {
        if (Yii::$app->session->has($name))
            Yii::$app->session->remove($name);
    }
}