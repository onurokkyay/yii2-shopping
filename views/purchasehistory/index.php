<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\widgets\ListView;
/* @var $this yii\web\View */
/* @var $searchModel onurokkyay\shopping\models\PurchasehistorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

function search()
{
    $query = \backend\Modules\Shopping\models\Purchasehistory::find();

    // add conditions that should always apply here

    $dataProvider = new ActiveDataProvider([
        'query' => $query,
    ]);
    // grid filtering conditions
    $query->andFilterWhere([
        'userid' => yii::$app->user->id,
    ]);

    return $dataProvider;
}
$dataProvider=search();
?>
<div class="purchasehistory-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    ListView::widget([


        'dataProvider' => $dataProvider,
        'options' => [
            'tag' => 'div',
            'class' => 'list-wrapper',
            'id' => 'list-wrapper',
        ],
        'layout' => "{pager}\n{items}\n{summary}",
        'itemView' => function ($model, $key, $index, $widget) {
            return $this->render('view',['model' => $model]);

            // or just do some echo
            // return $model->title . ' posted by ' . $model->author;
        },
        'itemOptions' => [
            'tag' => false,
        ],
        'pager' => [
            'firstPageLabel' => 'first',
            'lastPageLabel' => 'last',
            'nextPageLabel' => 'next',
            'prevPageLabel' => 'previous',
            'maxButtonCount' => 3,
        ],
    ]);
    ?>


</div>
