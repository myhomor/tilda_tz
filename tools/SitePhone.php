<?php
namespace app\tools;

use app\modules\admin\models;

trait SitePhone
{
    public function getSitePhoneByCity( string $city ):?string
    {
        if ( ( $phone = models\PhoneModel::find()->select(['phone'])->where(['city'=>$city])->asArray()->one() ) === NULL )
            $phone = \Yii::$app->params['site']['site_phone'];
        return isset($phone['phone']) ? $phone['phone'] : $phone;
    }

    /**
     * clear phone from +7(999)123 to 999123
     * @param string $phone
     * @return string
     */
    public function clearPhone( string $phone )
    {
        return preg_replace("/[^0-9]/", "", mb_substr($phone, 2));
    }
}