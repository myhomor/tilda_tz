<?include_once __DIR__.DIRECTORY_SEPARATOR.'include'.DIRECTORY_SEPARATOR.'header.php'?>
<?if( isset($tabs) && is_array($tabs) ):?>
    <ul class="nav nav-tabs">
        <?foreach ($tabs as $tab_code => $tab):?>
        <li class="nav-item">
            <a class="nav-link <?=($tab_code_active === $tab_code?'active':'')?>" href="<?=$tab['link']?>"><?=$tab['title']?></a>
        </li>
        <?endforeach;?>
    </ul>
<?endif;?>
<div class="card" style="border-top: 0px;border-radius: 0 4px;">
<div class="card-body">
<?
$tab = $tabs[$tab_code_active];
if( !isset($tab['type']) )
    echo 'Не указан тип контента';
else
{
    switch ($tab['type'])
    {
        case 'table':
            if( isset($tab['data']) )
            {
                $table = $tab['data'];
                include 'include/table.php';
            }
            else echo 'Не указаны параметры таблицы';
            break;
        case 'form':
            if( isset($tab['data']) )
            {
                $form = $tab['data'];
                include 'include/form.php';
            }
            else echo 'Не указаны параметры формы';
            break;

        default: echo 'Не найден тип контента';break;
    }
}
?>
</div>
</div>
<?include_once __DIR__.DIRECTORY_SEPARATOR.'include'.DIRECTORY_SEPARATOR.'footer.php'?>