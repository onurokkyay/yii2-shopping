<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model onurokkyay\shopping\models\Purchasehistory */

$this->title = $model->id;

\yii\web\YiiAsset::register($this);
?>
<div class="col-xs-4">
    <div class="purchasehistory-view">

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

            ],

        ]) ?>
        <?= DetailView::widget([
            'model' => $model->product->category,
            'attributes' => [

                'name',

            ],

        ]) ?>
    </div>
</div>