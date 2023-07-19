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
            <h2>Задача 2: Массивы</h2>
            <p>
                Нужно заполнить массив 5 на 7 случайными уникальными числами от 1000000000 до 5000000000.<br>
                Вывести получившийся массив и суммы по строкам и по столбцам.
            </p>
        </div>
        <div class="bg-light border rounded-3 p-3">
            <h2>Решение</h2>
            <?
            $min = 1000000000;
            $max = 5000000000;
            // Создание пустого массива 5x7
            $array = array_fill(0, 5, array_fill(0, 7, 0));

            $rowSums = array_fill(0, 5, 0);
            $columnSums = array_fill(0, 7, 0);

            $arrayVal = [];
            $_mt_rand = function ($min,$max, array &$keys) use(&$_mt_rand):int
            {
                $i = mt_rand($min,$max);
                if( in_array($i, $keys) )
                    $i = $_mt_rand($min, $max, $keys);
                $keys[] = $i;
                return $i;
            };

            for ($i = 0; $i < 5; $i++) {
                for ($j = 0; $j < 7; $j++) {
                    $array[$i][$j] = $_mt_rand($min,$max,$arrayVal);
                    $rowSums[$i] += $array[$i][$j];
                    $columnSums[$j] += $array[$i][$j];
                }
            }

            // Вывод массива
            echo "Массив 5x7:<br>";
            for ($i = 0; $i < 5; $i++) {
                for ($j = 0; $j < 7; $j++) {
                    echo $array[$i][$j] . "\t";
                }
                echo "<br>";
            }
            echo "<br>";
            // Вывод сумм строк
            echo "Суммы по строкам:<br>";
            foreach ($rowSums as $sum) {
                echo $sum . "<br>";
            }
            echo "<br>";
            // Вывод сумм столбцов
            echo "Суммы по столбцам:<br>";
            foreach ($columnSums as $sum) {
                echo $sum . "<br>";
            }
            ?>

            <textarea class="mt-2" style="width: 100%;height: 300px">
            $min = 1000000000;
            $max = 5000000000;
            // Создание пустого массива 5x7
            $array = array_fill(0, 5, array_fill(0, 7, 0));

            $rowSums = array_fill(0, 5, 0);
            $columnSums = array_fill(0, 7, 0);

            $arrayVal = [];
            $_mt_rand = function ($min,$max, array &$keys) use(&$_mt_rand):int
            {
                $i = mt_rand($min,$max);
                if( in_array($i, $keys) )
                    $i = $_mt_rand($min, $max, $keys);
                $keys[] = $i;
                return $i;
            };

            for ($i = 0; $i < 5; $i++) {
                for ($j = 0; $j < 7; $j++) {
                    $array[$i][$j] = $_mt_rand($min,$max,$arrayVal);
                    $rowSums[$i] += $array[$i][$j];
                    $columnSums[$j] += $array[$i][$j];
                }
            }

            // Вывод массива
            echo "Массив 5x7:<br>";
            for ($i = 0; $i < 5; $i++) {
                for ($j = 0; $j < 7; $j++) {
                    echo $array[$i][$j] . "\t";
                }
                echo "<br>";
            }
            echo "<br>";
            // Вывод сумм строк
            echo "Суммы по строкам:<br>";
            foreach ($rowSums as $sum) {
                echo $sum . "<br>";
            }
            echo "<br>";
            // Вывод сумм столбцов
            echo "Суммы по столбцам:<br>";
            foreach ($columnSums as $sum) {
                echo $sum . "<br>";
            }
            </textarea>

            <h2>Пояснение</h2>
            <p class="mb-2">
                Решение использует два цикла для заполнения массива случайными уникальными числами и вычисления сумм строк и столбцов. Далее использую функцию array_fill для создания пустого массива заданного размера и функцию $_mt_rand для генерации случайного числа в пределах задачи с проверкой на уникальность.
            </p>
            <p class="mb-2">
                После заполнения массива и вычисления сумм, выводим массив, а затем отдельно выводим суммы по строкам и по столбцам.
            </p>
        </div>
    </div>
</div>