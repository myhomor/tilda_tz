<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\forms\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

?>
<div class="container-fluid pb-3">
    <div class="d-grid gap-3" style="grid-template-columns: 1fr 2fr;">
        <div class="bg-light border rounded-3 p-3">
            <h2>Задача 1: Лесенка</h2>
            <p>
                Нужно вывести лесенкой числа от 1 до 100.<br>
                1<br>
                2 3<br>
                4 5 6<br>
                ...
            </p>
        </div>
        <div class="bg-light border rounded-3 p-3">
            <h2>Решение</h2>
            <?
            $number = $rows = 1;
            $limit = 100;

            while ($number <= $limit)
            {
                for ($a = 1; $a <= $rows; $a++)
                {
                    if ($number > $limit)
                        echo '.+ ';
                    else
                        echo $number . ' ';
                    $number++;
                }
                echo PHP_EOL . '<br>';
                $rows++;
            }?>
            <textarea style="width: 100%;height: 300px">
                $number = $rows = 1;
                $limit = 100;

                while ($number <= $limit)
                {
                    for ($a = 1; $a <= $rows; $a++)
                    {
                        if ($number > $limit)
                            echo '.+ ';
                        else
                            echo $number . ' ';
                        $number++;
                    }
                    echo PHP_EOL . '<br>';
                    $rows++;
                }
            </textarea>

            <h2>Пояснение</h2>
            <p class="mb-2">
                В этом решении используется цикл while, который выполняется, пока $number не превысит $limit (100). В каждой итерации цикла проверяется цикл for, чтобы выводить числа в каждой строке. Если число $number превышает $limit, то выводится символ ".+" вместо числа
            </p>
        </div>
    </div>
</div>