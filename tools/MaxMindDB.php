<?php
namespace app\tools;
use app\modules\admin\models\CityModel;

trait MaxMindDB
{
    use \app\tools\Helper;
    public string $user_city_def = 'Moskva';
    public string $user_city = '';
    public string $last_error = '';
    final protected function getUserIP():string
    {
        $value = '';
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $value = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $value = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } elseif (!empty($_SERVER['REMOTE_ADDR'])) {
            $value = $_SERVER['REMOTE_ADDR'];
        }
        return $value;
    }

    public function getUserCity():?string
    {
        if( $city = $this->getSessionVal('city') )
            return $city;

        try {
            $reader = new \MaxMind\Db\Reader(__DIR__.'/../local/mmdb/geolite2_city.mmdb');
            // IP-адрес, для которого требуется получить географическую информацию
            $ipAddress = $this->getUserIP();
            $ipAddress = $ipAddress === '127.0.0.1' ? '89.148.235.160' : $ipAddress;
            //$ipAddress = '5.228.201.185';
            // Получение географической информации по IP-адресу
            $record = $reader->get($ipAddress);
            $reader->close();
            return $record['city']['names']['en'];
        } catch (\Exception $e) {
            // Обработка ошибки при работе с базой данных
            $this->last_error = 'Произошла ошибка: ' . $e->getMessage();
            return null;
        }
    }

    public function setUserCity( string $city):bool
    {
        if( ($_city = CityModel::find()->where(['code' => $city])->asArray()->one()) === NULL )
            return false;

        $this->setSessionVal('city',$city);
        //\Yii::$app->session->set('city', $city );
        return true;
    }
}