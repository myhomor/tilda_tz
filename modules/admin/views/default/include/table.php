<?if(isset($table) && isset($table['head'])):?>
    <table class="table">
        <?if( isset($table['items']) && is_array($table['items']) && count($table['items']) ):?>
            <thead>
            <tr>
                <?foreach ( $table['head'] as $head ):?>
                    <th scope="col"><?=$head?></th>
                <?endforeach;?>
                <?if(isset($table['link'])):?>
                    <th scope="col"></th>
                <?endif;?>
                <?if(isset($table['link_delete'])):?>
                    <th scope="col"></th>
                <?endif;?>
            </tr>
            </thead>
            <tbody>
            <?foreach ($table['items'] as $item)
            {
                echo '<tr>';
                foreach ( array_keys($table['head']) as $_k => $key )
                {
                    if( $_k === 0)
                        echo '<th scope="row">'.$item[$key].'</th>';
                    else
                        echo '<td>'.$item[$key].'</td>';
                }

                if(isset($table['link']))
                    echo '<td><a href="'.\yii\helpers\Url::to( [$table['link'], 'id' => $item['id'] ] ).'" class="btn btn-outline-primary">Открыть</a></td>';

                if(isset($table['link_delete']))
                    echo '<td><a href="'.\yii\helpers\Url::to( [$table['link_delete'], 'id' => $item['id'] ] ).'" class="btn btn-outline-danger"><i class="bi bi-trash3-fill"></i></a></td>';
                echo '</tr>';
            }?>
            </tbody>
        <?else:?>
            Нет доступных элементов для отображения
        <?endif;?>
    </table>
<?endif;?>