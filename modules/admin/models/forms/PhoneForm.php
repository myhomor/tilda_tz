<?php
namespace app\modules\admin\models\forms;
class PhoneForm extends Common
{
    public $phone;
    public $city;
    protected string $model = "\app\modules\admin\models\PhoneModel";

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['phone'], 'required', 'message'=> 'Пожалуйста, заполните поле'],
            [['city'], 'safe']
        ];
    }

    public static function getFormFields():array
    {
        return [
            [
                'code' => 'phone',
                'title' => 'Телефон',
                'type' => 'input',
                'class' => 'js-phone'
            ],
            [
                'code' => 'city',
                'title' => 'Привязать город',
                'type' => 'select',
                'value_list' => \yii\helpers\ArrayHelper::map(
                        \app\modules\admin\models\CityModel::find()->select(['code','title'],)->asArray()->all(),
                        'code', 'title'
                    )
            ]
        ];
    }
}