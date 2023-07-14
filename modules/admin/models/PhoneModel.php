<?php
namespace app\modules\admin\models;
class PhoneModel extends \yii\db\ActiveRecord implements inteface\iAdmin
{
    public static function tableName()
    {
        return 'phone';
    }

    public static function getHeadTable():array
    {
        return [
            'id' => '#',
            'phone' => 'Телефон',
            'city' => 'Город',
            'date_create' => 'Дата создания',
            'date_update' => 'Дата обновления',
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert))
        {
            if ($insert)
                $this->setAttribute('date_create', date("Y-m-d H:i:s"));
            else
                $this->setAttribute('date_update', date("Y-m-d H:i:s"));
            return true;
        }
        return false;
    }
}