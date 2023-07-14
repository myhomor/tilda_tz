<?php
namespace app\modules\admin\models;
class CityModel extends \yii\db\ActiveRecord implements inteface\iAdmin
{
    public static function tableName()
    {
        return 'city';
    }

    public static function getHeadTable():array
    {
        return [
            'id' => '#',
            'code' => 'Код',
            'title' => 'Название',
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