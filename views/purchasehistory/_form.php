<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model onurokkyay\shopping\models\Purchasehistory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="purchasehistory-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'userid')->textInput() ?>

    <?= $form->field($model, 'productid')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
