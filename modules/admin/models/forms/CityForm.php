<?php
namespace app\modules\admin\models\forms;
class CityForm extends Common
{
    public $title;
    public $code;
    protected string $model = "\app\modules\admin\models\CityModel";
    //public string $code;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['title'], 'required', 'message'=> 'Пожалуйста, заполните поле']
        ];
    }

    public static function getFormFields():array
    {
        return [
            [
                'code' => 'title',
                'title' => 'Название',
                'type' => 'input'
            ],
            [
                'code' => 'code',
                'title' => 'Символьный код',
                'type' => 'input'
            ]
        ];
    }
}