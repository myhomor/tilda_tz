<div class="container-fluid">
    <div class="row">
        <nav class="col-md-3 d-none d-md-block bg-light sidebar">
            <div class="d-flex flex-column flex-shrink-0 p-3 bg-light">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                    <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                    <span class="fs-4">Управление контентом</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li>
                        <a href="/admin/city/list/" class="nav-link <?=\Yii::$app->init->active_menu_code_admin === 'city' ? 'active' : ''?> link-dark">
                            <i class="bi bi-journal-text"></i>
                            Список городов
                        </a>
                    </li>
                    <li>
                        <a href="/admin/phone/list/" class="nav-link <?=\Yii::$app->init->active_menu_code_admin === 'phone' ? 'active' : ''?> link-dark">
                            <i class="bi bi-telephone-fill"></i>
                            Телефоны
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="m-3">
                    <i class="bi bi-person-workspace mb-3"></i>
                    <?if(!is_null(Yii::$app->user->identity)):?>
                    <?=Yii::$app->user->identity->username?>( <a href="/logout/">Выйти</a> )
                    <?endif;?>
                </div>
            </div>
        </nav>

        <main role="main" class="col-md-8 ml-sm-auto col"-lg-8 pt-3 px-4">

<?if( isset($header) ):?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
    <?if(isset($header['title'])):?>
    <h1 class="h2"><?=$header['title']?></h1>
    <?endif;?>

    <?if(isset($header['btn'])):?>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <?foreach ($header['btn'] as $item):?>
                <?if(isset($item['link'])):?><a href="<?=$item['link']?>"><?endif;?>
                <button class="btn me-md-2 <?=(!isset($item['class'])?'btn-primary':$item['class'])?>" type="button">
                    <?if(isset($item['icon'])):?>
                        <i class="bi <?=$item['icon']?> mb-3"></i>
                    <?endif;?>
                    <?=$item['title']?>
                </button>
                <?if(isset($item['link'])):?></a><?endif;?>
            <?endforeach;?>
        </div>
    <?endif;?>
</div>
<?endif;?>