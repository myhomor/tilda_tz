<?php
// display pagination
if( isset($pages) && is_object($pages) )
{
    echo \yii\widgets\LinkPager::widget([
        'pagination' => $pages,
        'options' => [
            'class' => 'pagination pagination-circle pg-blue mb-0'],
        'linkOptions' => ['class' => 'page-link']
    ]);
}
?>
</main>
</div>
</div>