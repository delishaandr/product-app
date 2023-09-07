<?php
   use yii\helpers\Html;
   use yii\grid\GridView;

   echo GridView::widget([
      'dataProvider' => $dataProvider,
      'columns' => [
         [
            'attribute' => 'img',
            'format' => 'html',
            'label' => 'Image',
            'value' => function($data) {
               return Html::img($data->images[0], ['width' => '100px']);
            }
         ],
         'title',
         'category',
         'brand',
         'stock',
         'price',
      ]
   ]);
?>