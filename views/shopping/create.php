<?php

use yii\helpers\Html;
use  melih058\products\models\Products;

/* @var $this yii\web\View */
/* @var $model onurokkyay\shopping\models\shoppingcart */


$this->title = 'Create Shoppingcart';
$this->params['breadcrumbs'][] = ['label' => 'Shoppingcarts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="shoppingcart-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('addcart', [
        'model' => $model,

    ]) ?>

</div>
