<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

\Yii::$app->db
    ->createCommand('INSERT INTO user (email, password) VALUES
("test3@example.com", "test3");')
    ->execute()


/* @var $this yii\web\View */
/* @var $model onurokkyay\shopping\models\ShoppingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shoppingcart-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'userid') ?>

    <?= $form->field($model, 'productid') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
