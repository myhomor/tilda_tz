<?php

namespace app\modules\admin\models\forms;

abstract class Common extends \yii\base\Model
{
    protected string $model;
    abstract public static function getFormFields():array;

    public function update( \yii\base\Model $element ):bool
    {
        foreach ($this->attributes as $code => $val )
            $element->setAttribute($code,$val);
        return $element->validate() && $element->save();
    }

    public function create()
    {
        if( $this->validate() ) {
            $m = new $this->model;
            foreach ($this->attributes as $code => $val )
                $m->setAttribute($code,$val);
            return ( $m->save() ? $m->id : false );
        }
        return false;
    }
}