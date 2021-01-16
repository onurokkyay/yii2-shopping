<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;
use backend\Modules\products\models\Products;

/* @var $this yii\web\View */
/* @var $model onurokkyay\shopping\models\shoppingcart */
$this->title = "Ürünler Listesi";

\yii\web\YiiAsset::register($this);
?>
<div class="col-xs-4">
<div class="shoppingcart-view">

    <h1><?= Html::encode($model->product->name) ?></h1>


    <p>
        <a >
            <img border="0" src="<?php echo $model->product->picture; ?>" width="300" height="200">
        </a>

    </p>
    <?= DetailView::widget([
        'model' => $model->product,
        'attributes' => [

            'name',
            'count',

        ],

    ]) ?>
    <?= DetailView::widget([
        'model' => $model->product->category,
        'attributes' => [

            'name',

        ],

    ]) ?>
    <p>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
</div>
</div>