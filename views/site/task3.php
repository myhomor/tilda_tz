<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\forms\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

?>
<div class="container-fluid pb-3">
   <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Описание</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Решение</button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <style>.close{display: none}</style>
        <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="d-grid gap-3" style="grid-template-columns: 1fr 2fr;">
                <div class="bg-light border rounded-3 p-3">
                    <h2>Задача 3: фронт</h2>
                    <p>
                        Вы работаете в компании, присутствующей в нескольких городах РФ. На сайте компании есть страница с контактной информацией. Маркетолог поставил задачу и уехал, к его приезду задача должна быть реализована.
                    </p>
                    <p>
                        На страницу контактов заходят люди из разных городов, нужно чтобы они видели телефон из своего города. По умолчанию, в HTML-страницы прописан телефон 8-800-DIGITS. Телефон размещен в верху и внизу страницы.
                    </p>
                    <p>
                        Вот и все что рассказал маркетолог прежде чем уехать
                    </p>
                </div>
                <div class="bg-light border rounded-3 p-3">
                    <h2>Решение</h2>
                    <p>
                        Для определения города по IP-адресу я использовал библиотеку <a href="https://github.com/maxmind/MaxMind-DB-Reader-php" target="_blank">MaxMind-DB-Reader-php</a>.
                        Эта библиотека позволяет извлекать информацию о городе на основе IP-адреса пользователя.
                        <br>
                        <br>
                        Когда пользователь изменяет выбранный город, вызывается событие onchange для элемента select.js-select-city. Затем браузер отправляет AJAX-запрос на сервер.
                        <br>
                        <br>
                        На серверной стороне обратывается запрос и устанавливается выбранный город пользователя в текущей сессии.
                        Кроме того, идет поиск телефона, связанного с выбранным городом.
                        <br>
                        <br>
                        Если выбранный город не имеет связанного телефона, то устанавливается номер по умолчанию, который состоит из цифр 8-999-999-99-99.
                        <br>
                        <br>
                        Редактирование, добавление и изменение телефонных номеров, а также привязка их к конкретным городам, осуществляется через <a href="/admin/" target="_blank">административную панель</a>.
                        В этой панели есть соответствующие функциональные возможности для управления телефонами и их привязкой к городам.
                    </p>
                </div>
            </div>
        </div>
        <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

            <div class="d-flex align-items-center pb-3 mb-5 border-bottom">
                <div class="d-flex align-items-center text-dark text-decoration-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" class="me-2" viewBox="0 0 118 94" role="img"><title>Bootstrap</title><path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z" fill="currentColor"></path></svg>
                    <span class="fs-4">
                        <?if( isset($city) && is_array($city) ):?>
                        Ваш город: <select  class="form-select js-select-city">
                                <?foreach ($city as $c => $v):?>
                                <option value="<?=$c?>" <?=$user_city === $c ?'selected':''?>><?=$v?></option>
                                <?endforeach;?>
                        </select>
                        <?endif;?>
                    </span>
                </div>

                <div class="fs-4" style="margin-left: 50px">
                    <?if( isset($city) && is_array($city) ):?>
                        Ваш телефон: <a href="tel:+7<?=$user_phone?>" class="js-phone"><?=$user_phone?></a>
                    <?endif;?>
                </div>

            </div>

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
                    <p class="lead">And yes, this is the last block of representative placeholder content. Again, not really intended to be actually read, simply here to give you a better view of what this would look like with some actual content. Your content.</p>
                </div>
                <div class="col-md-5">
                    <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"></rect><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>
                </div>
            </div>

            <hr class="featurette-divider">
            <div class="container">
                <p class="float-end">@<?=date('Y')?></p>
                <div class="fs-4">
                    <?if( isset($city) && is_array($city) ):?>
                        Ваш телефон: <a href="tel:+7<?=$user_phone?>" class="js-phone"><?=$user_phone?></a>
                    <?endif;?>
                </div>
            </div>
        </div>
    </div>

</div>