<?php
   use yii\helpers\Html;
   use yii\grid\GridView;
   use yii\helpers\Url;
   use yii\bootstrap5\Button;

   $this->title = 'Product List';
   $urlData = Url::to(['site/get-table-data']);
   $urlDetail = Url::to(['site/get-product-detail']);

   $js = <<<js
      $('#showBtn').on('click', function () {
         $.ajax({
            url: '{$urlData}',
            type: 'GET',
            success: function(data) {
               $('#table').html(data);
            }
         });
      });
   js;
   $this->registerJs($js);
?>

<div class="show-data">
   <h3><u>PRODUCT LIST</u></h3>
   <?= Html::button('Show Products', [ 
      'class' => 'btn btn-md btn-primary float-end', 'id' => 'showBtn']);
   ?><br><br><br>
</div>

<div id="table">
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
      ]);
   ?>
</div>