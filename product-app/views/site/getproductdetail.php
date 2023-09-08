<?php
   use yii\helpers\Html;
   use kartik\rating\StarRating;
   use yii\grid\GridView;
   use yii\helpers\Url;
   use yii\bootstrap5\Button;

   $this->title = 'Product Detail';
   $img = $data->images;
   $placeholder = 'https://roadmap-tech.com/wp-content/uploads/2019/04/placeholder-image.jpg';
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
    <h3><u><?= $data->title; ?></u></h3>
    <div class="card mt-4 border-0">
        <div class="row">
            <div class="col-md-6">
                <div class="preview-pic tab-content">
                    <div class="tab-pane active" id="pic-1"><?= "<img src='".(array_key_exists(0,$img) ? $img[0] : $placeholder)."' style='height:250px; margin: auto; display: block;' />" ?></div>
                    <div class="tab-pane" id="pic-2"><?= "<img src='".(array_key_exists(1,$img) ? $img[1] : $placeholder)."' style='height:250px; margin: auto; display: block;' />" ?></div>
                    <div class="tab-pane" id="pic-3"><?= "<img src='".(array_key_exists(2,$img) ? $img[2] : $placeholder)."' style='height:250px; margin: auto; display: block;' />" ?></div>
                    <div class="tab-pane" id="pic-4"><?= "<img src='".(array_key_exists(3,$img) ? $img[3] : $placeholder)."' style='height:250px; margin: auto; display: block;' />" ?></div>
                </div>
                <ul class="preview-thumbnail nav nav-tabs">
                    <li class="active"><a data-target="#pic-1" data-toggle="tab"><?= "<img src='".(array_key_exists(0,$img) ? $img[0] : $placeholder)."' />" ?></a></li>
                    <li><a data-target="#pic-2" data-toggle="tab"><?= "<img src='".(array_key_exists(1,$img) ? $img[1] : $placeholder)."' />" ?></a></li>
                    <li><a data-target="#pic-3" data-toggle="tab"><?= "<img src='".(array_key_exists(2,$img) ? $img[2] : $placeholder)."' />" ?></a></li>
                    <li><a data-target="#pic-4" data-toggle="tab"><?= "<img src='".(array_key_exists(3,$img) ? $img[3] : $placeholder)."' />" ?></a></li>
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