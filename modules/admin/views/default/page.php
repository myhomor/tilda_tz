<?include_once __DIR__.DIRECTORY_SEPARATOR.'include'.DIRECTORY_SEPARATOR.'header.php';
if( isset($type) )
{
    switch ($type)
    {
        case 'table':
            if( isset($data) )
            {
                $table = $data;
                include 'include/table.php';
            }
            else echo 'Не указаны параметры таблицы';
            break;
        case 'form':
            if( isset($data) )
            {
                $form = $data;
                include 'include/form.php';
            }
            else echo 'Не указаны параметры формы';
            break;

        default: echo 'Не найден тип контента';break;
    }
}
include_once __DIR__.DIRECTORY_SEPARATOR.'include'.DIRECTORY_SEPARATOR.'footer.php';