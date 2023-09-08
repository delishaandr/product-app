<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Add Product';
?>
<div class="add-product">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin(['id' => 'produk-form']); ?>

                <?= $form->field($model, 'no_pesanan')->textInput(['type' => 'text', 'maxlength' => 20, 'autofocus' => true]) ?>

                <?= $form->field($model, 'tanggal')->widget(\yii\jui\DatePicker::className(), ['options' => ['class' => 'form-control'], 'dateFormat' => 'yyyy-MM-dd']) ?>

                <?= $form->field($model, 'nm_supplier')->textInput(['type' => 'text', 'maxlength' => 50]) ?>

                <?= $form->field($model, 'nm_produk')->textInput(['type' => 'text', 'maxlength' => 50]) ?>

                <?= $form->field($model, 'total')->textInput(['type' => 'float']) ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'submit-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
