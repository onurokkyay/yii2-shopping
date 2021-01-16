<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model onurokkyay\shopping\models\shoppingcart */

$this->title = 'Update Shoppingcart: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Shoppingcarts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="shoppingcart-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
