<?php
    use yii\grid\GridView;
    use yii\helpers\Html;
    use yii\bootstrap5\Button;

?>
<?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute' => 'img',
                'format' => 'html',
                'label' => 'Image',
                'value' => function($data) {
                   return Html::img($data->images[0], ['width' => '150px']);
                }
            ],
            'title',
            'category',
            'brand',
            'stock',
            [
            'label' => 'Price',
            'value' => function($data) {
                return '$ '.number_format($data->price, 2);
            }
            ],
            [
            'label' => 'Action',
            'format' => 'raw',
            'value' => function($data) {
                return Html::button('View', [ 
                    'class' => 'btn btn-md btn-primary',
                    'onclick' => 'js:document.location.href="index.php?r=site/get-product-detail&id='.$data->id.'"'
                ]);
            }
            ]
        ]
    ])
?>