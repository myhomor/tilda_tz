<?php
namespace app\components\init;
class initComponent extends \yii\base\Component
{
    public $active_menu_code = 't1';
    public $active_menu_code_admin = 'city';
    public function init()
    {
        parent::init();
    }
}