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
            $number = 1;
            $rows = 10; // Количество строк в лесенке

            for ($i = 1; $i <= $rows; $i++) {
                for ($j = 1; $j <= $i; $j++) {
                    echo $number . " ";
                    $number++;
                }
                echo PHP_EOL.'<br>';
            }?>
            <textarea style="width: 100%;height: 300px">
                $number = 1;
                $rows = 10; // Количество строк в лесенке

                for ($i = 1; $i <= $rows; $i++) {
                    for ($j = 1; $j <= $i; $j++) {
                        echo $number . " ";
                        $number++;
                    }
                    echo PHP_EOL.'<br>';
                }
            </textarea>

            <h2>Пояснение</h2>
            <p class="mb-2">
                В этом решении мы используем два цикла: внешний цикл отвечает за количество строк в лесенке, а внутренний цикл выводит числа в каждой строке. Переменная $number отвечает за текущее число, которое будет выводиться.
            </p>
            <p class="mb-2">
                Таким образом, при запуске этого кода вы получите вывод чисел от 1 до 100 в виде лесенки:<br>
                <br>
                1<br>
                2 3<br>
                4 5 6<br>
                7 8 9 10<br>
                11 12 13 14 15<br>
                ...
            </p>
        </div>
    </div>
</div>