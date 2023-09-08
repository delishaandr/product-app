<?php
   use yii\helpers\Html;
   use kartik\rating\StarRating;
   use yii\grid\GridView;
   use yii\helpers\Url;
   use yii\bootstrap5\Button;

   $this->title = 'Product Detail';
?>

<style type="text/css">
    .preview-thumbnail.nav-tabs {
        border: none;
        margin-top: 15px; 
    }
    .preview-thumbnail.nav-tabs li {
        width: 22%;
        margin-right: 2.5%; 
    }
    .preview-thumbnail.nav-tabs li img {
        max-width: 100%;
        display: block; 
    }
    .preview-thumbnail.nav-tabs li a {
        padding: 0;
        margin: 0; 
    }
    .preview-thumbnail.nav-tabs li:last-of-type {
        margin-right: 0; 
    }
</style>

<div class="container mt-2">
    <h3><u><?= Html::encode($data->title); ?></u></h3>
    <div class="card mt-4 border-0">
        <div class="row">
            <div class="col-md-6">
                <div class="preview-pic tab-content">
                    <div class="tab-pane active" id="pic-1"><img src="https://i.dummyjson.com/data/products/1/1.jpg" /></div>
                    <div class="tab-pane" id="pic-2"><img src="https://i.dummyjson.com/data/products/1/2.jpg" /></div>
                    <div class="tab-pane" id="pic-3"><img src="https://i.dummyjson.com/data/products/1/3.jpg" /></div>
                    <div class="tab-pane" id="pic-4"><img src="https://i.dummyjson.com/data/products/1/4.jpg" /></div>
                </div>
                <ul class="preview-thumbnail nav nav-tabs">
                    <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="https://i.dummyjson.com/data/products/1/1.jpg" /></a></li>
                    <li><a data-target="#pic-2" data-toggle="tab"><img src="https://i.dummyjson.com/data/products/1/2.jpg" /></a></li>
                    <li><a data-target="#pic-3" data-toggle="tab"><img src="https://i.dummyjson.com/data/products/1/3.jpg" /></a></li>
                    <li><a data-target="#pic-4" data-toggle="tab"><img src="https://i.dummyjson.com/data/products/1/4.jpg" /></a></li>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6 mt-3">
                        <h4>Price: $<?= number_format(Html::encode($data->price)); ?></h4>
                    </div>
                    <div class="col-md-6">
                        <?php echo StarRating::widget([
                            'name' => 'rating_product',
                            'value' => Html::encode($data->rating),
                            'pluginOptions' => ['displayOnly' => true, 'showCaption' => false]
                        ]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p>Category: <?= Html::encode($data->category); ?></p>
                    </div>
                    <div class="col-md-6">
                        <p>Brand: <?= Html::encode($data->brand); ?></p>
                    </div>
                </div>
                <div class="mt-4">
                    <p>Description:</p>
                    <p><?= Html::encode($data->description) ?></p>
                </div>
            </div>
        </div>

    </div>
</div>